<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<header class="page-hero"><div class="container"><span class="eyebrow eyebrow-light"><?php echo esc_html( get_the_date() ); ?></span><h1><?php the_title(); ?></h1></div></header>
	<article class="section"><div class="container content-narrow entry-content"><?php the_content(); ?></div></article>
<?php endwhile; ?>
<?php get_footer(); ?>

