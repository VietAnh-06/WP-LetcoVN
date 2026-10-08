<?php get_header(); ?>
<section class="section archive-section">
	<div class="container content-narrow">
		<div class="section-heading"><span class="eyebrow">LETCO</span><h1><?php bloginfo( 'name' ); ?></h1></div>
		<?php if ( have_posts() ) : ?>
			<div class="post-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'post-card' ); ?>>
						<p class="meta"><time><?php echo esc_html( get_the_date() ); ?></time></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>Chưa có nội dung.</p>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>

