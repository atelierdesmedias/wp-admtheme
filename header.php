<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="lteie9 lteie8 lteie7 lteie6 ie6 no-js"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="lteie9 lteie8 lteie7 ie7 no-js"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="lteie9 lteie8 ie8 no-js"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="lteie9 ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>

	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="initial-scale=1.0">

	<!-- Place favicon.ico and apple-touch-icon.png in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.min.css" media="screen, projection">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700,400,600,300' rel='stylesheet' type='text/css'>

	<?php wp_enqueue_script("jquery"); ?>

	<?php // Use this url to get your personnal build http://www.modernizr.com/download/ ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>


	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<?php wp_head(); ?>

	</head>

<body <?php body_class(); ?> >
	<div class="container">
		<header role="banner">
            <div class="site-title">
                <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-atelier-des-medias.png" alt="Logo de <?php bloginfo('name'); ?>"/>
                </a>
            </div>

			<nav class="site-menu" id="menu" role="navigation">
				<?php
					wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary' ) );
                ?>
			</nav>
			<ul class="social-links">
			<li class="icon-twitter"><a href="https://twitter.com/Coworking_lyon" title="Twitter ADM" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/iconeTwitter.png" </img></a></li>
			<li class="icon-facebook"><a href="https://www.facebook.com/Coworkinglyon" title="Facebook ADM" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/iconeFB.png"></img></a></li>						
			<li class="icon-intranet"><a href="https://intra.atelier-medias.org" title="Intranet coworkers" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/iconeWiki.png"></img></a></li>
			</ul>

		</header>

		<div class="contentWrapper">

			<?php if (is_page()) {?>
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
          <img id="home_picture" class="content-bandeauImage" src='<?php echo $image[0]; ?>'/>
        <?php endif; ?>
      <?php } ?>

			<?php if (!is_page()){?>
          <section id="content" role="region" class="content mod left w70">
      <?php } ?>


