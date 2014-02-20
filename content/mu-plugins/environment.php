<?php

/**
 * Environment configuration
 */

$wpgists_dont_change_theme = function() {
	return 'wpgists';
};
add_filter( 'pre_option_stylesheet', $wpgists_dont_change_theme );
add_filter( 'pre_option_template', $wpgists_dont_change_theme );


add_filter( 'permalink_structure', function() {
	return '/%year%/%monthnum%/%day%/%postname%/';
});