<?php global $post; if ( 'post' == $post->post_type ) : ?>
<div class="entry-footer">
  <?php echo trina_read_more_link() ?>

  <?php
  if ( is_category() && $catz = trina_catz(', ') ) : // ?>
  <?php endif; ?>
  <?php if ( is_tag() && $tag_it = trina_tag_it(', ') ) : // ?>
  <span class="tag-links"><?php printf( __( 'Also tagged %s', 'trina' ), $tag_it ); ?></span>
  <?php else : ?>
  <?php the_tags( '<span class="tag-links"><span class="entry-footer-prep entry-footer-prep-tag-links">' . __('Tagged ', 'trina' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\"></span>\n" ); ?>
  <?php endif; ?>
  <!--<?php edit_post_link( __( 'Edit', 'trina' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ); ?>-->
  <?php endif; ?>
</div>
