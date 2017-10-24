<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage izba
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/fonts/proxima.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/styles/tabulous.css">
		<!--
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.min.css">
		-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/styles/main.css">
		<?php wp_head();?>
	</head>
	<body <?php body_class(); ?>>
