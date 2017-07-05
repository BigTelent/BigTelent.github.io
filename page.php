<?php get_header(); ?>
<div id="primary" class="single-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></header>
			<div class="single-content">				
			<!-- 文章内容 -->
			<?php the_content(); ?>	
			</div>
		</article>
		<!-- 文章评论 -->
		<?php comments_template( '', true ); ?>
		<?php endwhile; ?>
	</main>
</div>

		
<?php get_sidebar(); ?>
<?php get_footer(); ?>