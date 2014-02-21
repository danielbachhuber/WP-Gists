define( ['backbone', 'app/router'], function( Backbone, Router ) {
	var GistImportView = Backbone.View.extend({
		events: {
			"click [data-control='import']": function( e ) {
				e.preventDefault();

				console.log( "Import!" );
				Router.navigate( 'gist/1/edit' );
			}
		},

		initialize: function( options ) {
			console.log( "Form:", this.$el );
		}
	});

	return GistImportView;
});