<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(' | ', true, 'right'); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
	<header>
		<div class="header-container">
		  <div id="branding">
		  <div id="site-title">
		  <img src="<?php header_image(); ?>" width=75 class="main-icon" />
		    <?php if ( false ) {} else {echo '<h1>';} ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home">
				<?php if (display_header_text()==true){ ?>
					<?php bloginfo( 'name' ) ?>
				<?php } else { ?>
					&nbsp;
				<?php } ?>
			</a><?php if ( false ) {} else {echo '</h1>';} ?>
		  </div>
		  <!--<p id="site-description"><?php bloginfo( 'description' ) ?></p>-->
		  </div>
		  <nav>
		  <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		  </nav>
		</div>
	</header>
	<div id="container">
