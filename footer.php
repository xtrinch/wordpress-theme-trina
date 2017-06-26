<div class="clear"></div>
</div>
<footer>
<div id="copyright">
	<div>
		<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'trina' ), '&copy;', date_i18n(__('Y','trina')), esc_html(get_bloginfo('name')) ); ?>
	</div>
	<div>
		<?php
		/* translators: 1: Link to WordPress.org */
		printf( __( 'Proudly powered by %1$s', 'trina' ),
			/* translators: 1: s: 'WordPress' */
			sprintf( '<a href="http://wordpress.org/" rel="nofollow">%s</a>', esc_html__( 'WordPress', 'trina' ) )
		); ?>

		<span class="sep"> | </span>

		<?php
		/* translators: 1: Link to trina.si */
		printf( __( 'Theme by %1$s', 'trina' ),
			/* translators: s: 'Trina' */
			sprintf( '<a href="http://trina.si/" rel="nofollow">%s</a>', esc_html__( 'Trina', 'trina' ) )
		);
		?>
	</div>
</div>
</footer>
</div>
	<?php wp_footer(); ?>
</body>
</html>
