<?php

//$domainf = $_SERVER["REQUEST_URI"];
//$domainf = explode('/', $domainf);
//$page = $domainf[count($domainf)-2];

$page = basename($_SERVER["REQUEST_URI"]);

if($page=="wp-signup.php") {
	wp_redirect("/registrar-se");
} 

/*elseif($page=="teams") {
	if(get_bloginfo('url')=="http://focalizador.com.br")
	wp_redirect("/times");
	
} */

/*elseif($page=="/wp-signup.php") {
	wp_enqueue_script("page-wp-signup-js");
}*/

if($page=="times" || $page=="teams" || $page=="membro" || $page=="members") {
	if(get_current_user_id()=="")
		wp_redirect("/registrar-se?warn=closed_to_members");
}

if($page=="times") {
	wp_enqueue_script("page-times-js");
}

if($page=="register" && $_SERVER['HTTP_HOST']=="focalizador.com.br") {
	wp_redirect("/registrar-se");
}

if($page=="teams") {
	if($_SERVER['HTTP_HOST']=="focalizador.com.br")
	wp_redirect("/times");
	wp_enqueue_script("page-teams-js");
}
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'projectimer_display_login_modal' ); ?>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<hgroup style="float:left">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
			<?php do_action("projectimer_main_show_header_buttons"); ?>
			<br style="clear:both" />
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
			<?php endif; ?>
		</header><!-- #masthead -->
		<?php //do_action('projectimer_main_show_header_popups'); ?>
		<?php 
		if($_GET["warn"]=="closed_to_members") { ?>
			<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<?php 
				if($_SERVER['HTTP_HOST']=="focalizador.com.br") {
					echo 'Por favor crie uma conta ou <a href=#faça class="open_settings_modal" data-toggle="modal" data-target="#login_modal" style="color:#A94442;text-decoration:underline;">faça o login</a> antes de ver membros e times"';
				} else {
					echo 'Please create an account or <a href=#faça class="open_settings_modal" data-toggle="modal" data-target="#login_modal" style="color:#A94442;text-decoration:underline;">login</a> before see members and teams"';
					//_e(" ", "projectimer-main");
				}
				 ?>
			</div>
		
		<?php }	?>
		<div id="main" class="wrapper">

