define( ['backbone'], function( Backbone ) {
	var Router = Backbone.Router.extend({
		routes: {
			"(/)": function() {
				require( ['app/github/gist.view'], function( GistImportView ) {
					new GistImportView({ el: '[data-view="gist-import"]' });
				});
			},

			"gist/:gist_id/edit(/)": function( gist_id ) {
				require( ['app/gist/gist_edit.view'], function( GistEditView ) {
					new GistEditView();
				});
			}
		}
	});

	return new Router();
});