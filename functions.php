<?php
//criado por Francisco Matelli Matulovic
//data-tag: 2016-09-30
add_filter('show_admin_bar', '__return_false'); 

add_action('init', 'theme_scripts');

function theme_scripts() {	
	//bootstrap
	wp_enqueue_style("boostrap-css", get_bloginfo("stylesheet_directory")."/css/bootstrap.min.css");
	wp_enqueue_script("boostrap-js", get_bloginfo("stylesheet_directory")."/js/bootstrap.min.js");
	
	//
	wp_register_script("page-teams-js", get_bloginfo("stylesheet_directory")."/js/page-teams.js");
	wp_register_script("page-times-js", get_bloginfo("stylesheet_directory")."/js/page-times.js");
	wp_register_script("page-wp-signup-js", get_bloginfo("stylesheet_directory")."/js/page-wp-signup.js");
}
