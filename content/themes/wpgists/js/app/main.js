require.config({
	baseUrl: wp_gists.app_root,

	paths: {
		'jquery': "http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min",
		'backbone': "http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.0/backbone-min",
		'underscore': "http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min"
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