#!/usr/bin/env bash
set -euo pipefail

cd -- "$(dirname -- "${BASH_SOURCE[0]}")/.."
export LOCAL_UID="$(id -u)"
export LOCAL_GID="$(id -g)"

case "${1:-help}" in
    start)
        if [[ ! -f .env ]]; then
            command -v python3 >/dev/null || { echo 'Install Python 3 to generate local secrets.' >&2; exit 1; }
            python3 - <<'PY'
import os
import secrets

content = (
    'COMPOSE_PROJECT_NAME=letco-rebuild\n'
    'WP_PORT=8081\n'
    'WORDPRESS_DB_NAME=wordpress\n'
    'WORDPRESS_DB_USER=wordpress\n'
    f'WORDPRESS_DB_PASSWORD={secrets.token_hex(24)}\n'
    f'WORDPRESS_AUTH_SECRET={secrets.token_hex(48)}\n'
)
fd = os.open('.env', os.O_WRONLY | os.O_CREAT | os.O_EXCL, 0o600)
with os.fdopen(fd, 'w') as output:
    output.write(content)
PY
        fi
        docker compose up -d --wait db wordpress
        docker compose ps
        ;;
    stop)
        docker compose stop
        ;;
    status)
        docker compose ps
        ;;
    logs)
        docker compose logs --tail=100 -f
        ;;
    wp)
        shift
        docker compose run --rm -T cli wp "$@"
        ;;
    *)
        echo 'Usage: bash scripts/local.sh {start|stop|status|logs|wp <arguments>}'
        ;;
esac
