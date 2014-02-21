define( ['backbone'], function( Backbone ) {
	var Router = Backbone.Router.extend({
		routes: {
			"(/)": function() {
				require( ['app/github/gist.view'], function( GistImportView ) {
					new GistImportView({ el: '[data-view="gist-import"]' });
				});
			}
		}
	});

	return new Router();
});