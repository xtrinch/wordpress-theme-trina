<?php global $authordata; ?>
<div class="entry-meta entry-meta-excerpt">
  <div>
    <span class="comments-link"><?php comments_number(__( '0', 'factoryreset' ), __( '1', 'factoryreset' ), __( '%', 'factoryreset' )) ?></span>
    <i class="fa fa-comments-o"></i>
  </div>
<div>
<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'factoryreset' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
<i class="fa fa-user-circle"></i><br />
</div>
<div>
<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
<i class="fa fa-calendar"></i>
</div>
</div>
