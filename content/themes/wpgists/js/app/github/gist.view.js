define( ['backbone', 'app/router', 'app/gists/gist.model'], function( Backbone, Router, Gist ) {
	var GistImportView = Backbone.View.extend({
		events: {
			"click [data-control='import']": function( e ) {
				e.preventDefault();

				// TODO: Validate gist_url before submitting.

				console.log( this.$gist_url.val() );

				Gist.importGithubGist( this.$gist_url.val() )
					.done( function( gist ) {
						Router.navigate( 'gist/' + gist.id + '/edit' );
					})
					.fail( function() {
						// TODO: Handle error.
						console.log( "Error! Could not import gist from Github." )
					});
			}
		},

		initialize: function( options ) {
			this.bind();
		},

		bind: function() {
			this.$gist_url = this.$( '[data-bind="gist_url"]' );
		}
	});

	return GistImportView;
});