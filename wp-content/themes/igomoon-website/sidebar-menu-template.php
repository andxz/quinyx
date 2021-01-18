<?php
/*
Template Name: Sidebar with submenu
 */

// Force the sidebar to be on the left side so that the menu can be there.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

// TODO If a menu is selected, add it the to the primary sidebar.

genesis();
