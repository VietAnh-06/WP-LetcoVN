<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $category = get_the_category(); ?>
	<header class="lp-page-hero">
		<div class="container">
			<p class="lp-page-meta">
				<?php if ( $category ) : ?><a href="<?php echo esc_url( get_category_link( $category[0] ) ); ?>"><?php echo esc_html( $category[0]->name ); ?></a><?php endif; ?>
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			</p>
			<h1><?php the_title(); ?></h1>
		</div>
	</header>
	<article class="section"><div class="container content-narrow">
		<?php if ( has_post_thumbnail() ) : ?><figure class="entry-featured"><?php the_post_thumbnail( 'large' ); ?></figure><?php endif; ?>
		<div class="entry-content"><?php the_content(); ?></div>
	</div></article>
<?php endwhile; ?>
<?php get_footer(); ?>
