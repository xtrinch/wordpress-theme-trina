<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header>
<div class="header-container">
  <div id="branding">
  <div id="site-title">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/headphones.svg" width=75 class="main-icon" />
    <?php if ( false ) {} else {echo '<h1>';} ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a><?php if ( false ) {} else {echo '</h1>';} ?>
  </div>
  <!--<p id="site-description"><?php bloginfo( 'description' ) ?></p>-->
  </div>
  <nav>
  <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
  </nav>
</div>
</header>
<div id="container">
