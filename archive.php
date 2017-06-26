<?php get_header(); ?>
<div id="content">
<?php the_post(); ?>
<h1 class="page-title">
	<?php echo the_archive_title(); ?>
</h1>
<?php rewind_posts(); ?>
<?php get_template_part( 'nav', 'above' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; ?>
<?php the_posts_pagination(); ?>
<?php get_template_part( 'nav', 'below' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
