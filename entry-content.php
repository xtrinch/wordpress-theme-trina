<div class="entry-content">
<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'factoryreset' ) . '&after=</div>') ?>
</div>
