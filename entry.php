<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="title-meta">
<?php
if ( is_singular() ) {
  echo '<h1 class="entry-title entry-title-excerpt">';
} else {
  echo '<h2 class="entry-title entry-title-excerpt">';
} ?>

<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read %s', 'trina'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) {echo '</h1>';} else {echo '</h2>';} ?>

<?php get_template_part( 'entry', 'meta' ); ?>
</div>
<?php
if(is_archive() || is_search() || !is_singular()){
get_template_part('entry','summary');
} else {
get_template_part('entry','content');
}
?>
<?php
if ( is_single() ) {
get_template_part( 'entry-footer', 'single' );
} else {
get_template_part( 'entry-footer' );
}
?>
</div>
