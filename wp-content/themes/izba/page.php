<?php
/**
 * The page template file
 *
 *
 * @package WordPress
 * @subpackage izba
 * @since 1.0
 * @version 1.0
 */

get_header();

if(have_posts())
	the_post();

the_content();

get_footer();
