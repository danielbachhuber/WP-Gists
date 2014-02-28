define( ['backbone'], function( Backbone ) {
	var Router = Backbone.Router.extend({
		routes: {
			"(/)": function() {
				require( ['app/github/gist.view'], function( GistImportView ) {
					new GistImportView({ el: '[data-view="gist-import"]' });
				});
			},

			"gist/:gist_id/edit(/)": function( gist_id ) {
				require( ['app/gists/gist.model', 'app/gists/gist_edit.view'], function( Gist, GistEditView ) {
					var gist = new Gist({ id: gist_id } );

					gist.fetch()
						.done( function() {
							var view = new GistEditView({ model: gist });

							Backbone.$( "#main" ).html( view.$el );
						})
						.fail( function() {
							console.log( "Could not load gist." );	// TODO: Better error handling.
						});
				});
			}
		}
	});

	return new Router();
});