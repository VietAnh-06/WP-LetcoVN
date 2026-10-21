<#
.SYNOPSIS
    Windows launcher for the LETCO WordPress local Docker environment.
    Equivalent to scripts/local.sh for PowerShell on Windows.

.DESCRIPTION
    Manages the local WordPress + MariaDB Docker Compose stack.
    Docker Desktop must be installed and running before using this script.

.EXAMPLE
    .\scripts\local.ps1 start       # Generate .env if missing, then start containers
    .\scripts\local.ps1 stop        # Stop all containers (database volume preserved)
    .\scripts\local.ps1 status      # Show container health and port bindings
    .\scripts\local.ps1 logs        # Follow live logs (Ctrl+C to exit)
    .\scripts\local.ps1 wp theme list  # Run any WP-CLI command inside a container
    .\scripts\local.ps1 open        # Open the local site in the default browser
#>

param(
    [Parameter(Position = 0)]
    [string]$Command = 'help',

    [Parameter(Position = 1, ValueFromRemainingArguments)]
    [string[]]$Rest
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

# -- Resolve project root (one level above this script) ----------------------
$ProjectRoot = Split-Path -Parent (Split-Path -Parent $MyInvocation.MyCommand.Path)
Set-Location $ProjectRoot

# -- .env helpers ------------------------------------------------------------
function Test-DotEnv {
    Test-Path (Join-Path $ProjectRoot '.env')
}

function New-DotEnv {
    Write-Host 'No .env found -- generating random secrets...' -ForegroundColor Cyan

    # Use .NET crypto for secrets (no Python dependency)
    $rng = [System.Security.Cryptography.RandomNumberGenerator]::Create()

    function Get-RandomHex([int]$bytes) {
        $buf = [byte[]]::new($bytes)
        $rng.GetBytes($buf)
        return [BitConverter]::ToString($buf).Replace('-', '').ToLower()
    }

    $dbPassword = Get-RandomHex 24
    $authSecret = Get-RandomHex 48
    $port       = '8081'

    $envContent = @"
COMPOSE_PROJECT_NAME=letco-rebuild
WP_PORT=$port
WORDPRESS_DB_NAME=wordpress
WORDPRESS_DB_USER=wordpress
WORDPRESS_DB_PASSWORD=$dbPassword
WORDPRESS_AUTH_SECRET=$authSecret
"@

    $envPath = Join-Path $ProjectRoot '.env'
    [System.IO.File]::WriteAllText($envPath, $envContent, [System.Text.Encoding]::UTF8)

    Write-Host ".env created at $envPath" -ForegroundColor Green
    Write-Host "WP_PORT=$port -> http://localhost:$port" -ForegroundColor DarkGray
}

function Read-DotEnvPort {
    $envPath = Join-Path $ProjectRoot '.env'
    if (-not (Test-Path $envPath)) { return '8081' }
    $line = Get-Content $envPath | Where-Object { $_ -match '^WP_PORT=' } | Select-Object -First 1
    if ($line) { return $line -replace '^WP_PORT=', '' }
    return '8081'
}

# -- Docker availability check -----------------------------------------------
function Assert-Docker {
    if (-not (Get-Command 'docker' -ErrorAction SilentlyContinue)) {
        Write-Error ('Docker not found in PATH. Install Docker Desktop from ' +
                     'https://www.docker.com/products/docker-desktop/ and restart your terminal.')
    }
    $null = docker info 2>&1
    if ($LASTEXITCODE -ne 0) {
        Write-Error 'Docker daemon is not running. Start Docker Desktop and try again.'
    }
}

# -- Commands ----------------------------------------------------------------
switch ($Command.ToLower()) {

    'start' {
        Assert-Docker
        if (-not (Test-DotEnv)) { New-DotEnv }

        Write-Host ''
        Write-Host 'Starting WordPress + MariaDB containers...' -ForegroundColor Cyan
        docker compose up -d --wait db wordpress
        if ($LASTEXITCODE -ne 0) { Write-Error 'docker compose up failed.' }

        $port = Read-DotEnvPort
        Write-Host ''
        Write-Host 'Stack is running!' -ForegroundColor Green
        Write-Host "  Site:  http://localhost:$port" -ForegroundColor White
        Write-Host "  Admin: http://localhost:$port/wp-admin/" -ForegroundColor White
        Write-Host ''
        docker compose ps
    }

    'stop' {
        Assert-Docker
        Write-Host 'Stopping containers (database volume preserved)...' -ForegroundColor Yellow
        docker compose stop
        Write-Host 'Done. Run .\scripts\local.ps1 start to restart.' -ForegroundColor Green
    }

    'status' {
        Assert-Docker
        docker compose ps
    }

    'logs' {
        Assert-Docker
        Write-Host 'Following logs -- press Ctrl+C to exit.' -ForegroundColor Cyan
        docker compose logs --tail=100 -f
    }

    'wp' {
        Assert-Docker
        if ($Rest.Count -eq 0) {
            Write-Host 'Usage: .\scripts\local.ps1 wp <wp-cli arguments>' -ForegroundColor Yellow
            Write-Host 'Example: .\scripts\local.ps1 wp theme list'
            exit 1
        }
        docker compose run --rm -T cli wp @Rest
    }

    'open' {
        $port = Read-DotEnvPort
        $url  = "http://localhost:$port"
        Write-Host "Opening $url ..." -ForegroundColor Cyan
        Start-Process $url
    }

    'export' {
        Assert-Docker
        $py = 'python'
        if (Get-Command 'python3' -ErrorAction SilentlyContinue) { $py = 'python3' }
        elseif (-not (Get-Command 'python' -ErrorAction SilentlyContinue)) {
            Write-Error 'Python 3 is required. Install from https://www.python.org/downloads/'
        }
        Write-Host 'Exporting static site to dist/cloudflare/ ...' -ForegroundColor Cyan
        & $py (Join-Path $ProjectRoot 'scripts\export-pages.py')
        Write-Host ''
        Write-Host 'Export complete. Deploy with:' -ForegroundColor Green
        Write-Host "  npx --yes wrangler@4.148.0 pages deploy dist/cloudflare --project-name=letco-rebuild --branch=main --commit-dirty=true"
    }

    'deploy' {
        Assert-Docker
        & (Join-Path $PSScriptRoot 'local.ps1') export
        Write-Host ''
        Write-Host 'Deploying to Cloudflare Pages...' -ForegroundColor Cyan
        npx --yes wrangler@4.148.0 pages deploy dist/cloudflare `
            --project-name=letco-rebuild --branch=main --commit-dirty=true
    }

    default {
        Write-Host ''
        Write-Host '  LETCO WordPress -- Windows Docker launcher' -ForegroundColor Cyan
        Write-Host ''
        Write-Host '  Usage: .\scripts\local.ps1 <command> [arguments]'
        Write-Host ''
        Write-Host '  Commands:'
        Write-Host '    start          Generate .env (if missing) and start containers'
        Write-Host '    stop           Stop containers; keep the database volume'
        Write-Host '    status         Show container health and port bindings'
        Write-Host '    logs           Follow live container logs (Ctrl+C to exit)'
        Write-Host '    wp <args>      Run a WP-CLI command, e.g.: wp theme list'
        Write-Host '    open           Open the local site in the default browser'
        Write-Host '    export         Build a static Cloudflare Pages export'
        Write-Host '    deploy         Export + deploy to Cloudflare Pages'
        Write-Host ''
        Write-Host '  Examples:'
        Write-Host '    .\scripts\local.ps1 start'
        Write-Host '    .\scripts\local.ps1 wp search-replace "old-url" "new-url" --all-tables-with-prefix'
        Write-Host '    .\scripts\local.ps1 open'
        Write-Host ''
        Write-Host '  WARNING: Docker Desktop must be installed and running.' -ForegroundColor Yellow
        Write-Host ''
    }
}
