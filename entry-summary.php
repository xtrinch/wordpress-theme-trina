<div class="entry-summary">
<?php if ( has_post_thumbnail() ) {
the_post_thumbnail();
} ?>
<?php the_excerpt( sprintf(__( 'continue reading %s', 'trina' ), '<span class="meta-nav">&rarr;</span>' )  ); ?>
<?php if(is_search()) {
wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'trina' ) . '&after=</div>');
}
?>
</div>
