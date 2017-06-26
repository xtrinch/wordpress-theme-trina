<div class="entry-footer">
<?php if ( is_tag() && $tag_it = trina_tag_it(', ') ) : // ?>
  <span class="tag-links"><?php printf( __( 'Also tagged %s', 'trina' ), $tag_it ); ?></span>
  <?php else : ?>
  <?php the_tags( '<span class="tag-links"><span class="entry-footer-prep entry-footer-prep-tag-links">' . __('Tagged ', 'trina' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\"> | </span>\n" ); ?>
  <?php endif; ?>
<?php
edit_post_link( __( 'Edit', 'trina' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" );
?>
</div>
