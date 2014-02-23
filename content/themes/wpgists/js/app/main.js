require.config({
	baseUrl: wp_gists.app_root,

	paths: {
		// Paths localized via theme `funtions.php`.
		'jquery':		wp_gists.paths.jquery,
		'backbone':		wp_gists.paths.backbone,
		'underscore':	wp_gists.paths.underscore
	},

	shim: {
		"backbone": {
			deps: ['underscore', 'jquery'],
			exports: 'Backbone'
		},
		"underscore": {
			exports: "_"
		},
	}
});

if ( typeof jQuery === 'function' ) {
	define( 'jquery', function() { return jQuery; });
}

require( ['backbone', 'app/router'], function( Backbone, Router ) {
	Backbone.history.start({ pushState: true });
});