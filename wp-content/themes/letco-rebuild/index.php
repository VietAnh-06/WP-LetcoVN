<?php get_header(); ?>
<?php
$news_page = (int) get_option( 'page_for_posts' );
if ( is_category() ) {
	$heading = single_cat_title( '', false );
} elseif ( is_home() && $news_page ) {
	$heading = get_the_title( $news_page );
} else {
	$heading = get_bloginfo( 'name' );
}
?>
<header class="lp-page-hero"><div class="container"><h1><?php echo esc_html( $heading ); ?></h1></div></header>
<section class="section archive-section">
	<div class="container content-narrow">
		<?php if ( $news_page && ( is_home() || is_category() ) ) : ?>
			<nav class="post-filters" aria-label="Chuyên mục tin tức">
				<a href="<?php echo esc_url( get_permalink( $news_page ) ); ?>"<?php echo is_home() ? ' class="is-active" aria-current="page"' : ''; ?>>Tất cả</a>
				<?php foreach ( get_categories( array( 'exclude' => (int) get_option( 'default_category' ), 'hide_empty' => true, 'childless' => true ) ) as $filter ) : ?>
					<a href="<?php echo esc_url( get_category_link( $filter ) ); ?>"<?php echo is_category( $filter->term_id ) ? ' class="is-active" aria-current="page"' : ''; ?>><?php echo esc_html( $filter->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>
		<?php if ( have_posts() ) : ?>
			<div class="post-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( has_post_thumbnail() ? 'post-card has-thumb' : 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="post-card-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php the_post_thumbnail( 'medium_large' ); ?></a>
						<?php endif; ?>
						<div class="post-card-copy">
							<p class="meta"><?php $category = get_the_category(); ?><?php if ( $category ) : ?><a class="post-card-category" href="<?php echo esc_url( get_category_link( $category[0] ) ); ?>"><?php echo esc_html( $category[0]->name ); ?></a><?php endif; ?><time><?php echo esc_html( get_the_date() ); ?></time></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php
			the_posts_pagination(
				array(
					'mid_size'           => 1,
					'prev_text'          => '<span aria-hidden="true">←</span> Trang trước',
					'next_text'          => 'Trang sau <span aria-hidden="true">→</span>',
					'screen_reader_text' => 'Phân trang tin tức',
					'aria_label'         => 'Phân trang tin tức',
				)
			);
			?>
		<?php else : ?>
			<p>Chưa có nội dung.</p>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>

