define( ['backbone'], function( Backbone ) {
	'use strict';

	var GistEditView = Backbone.View.extend({
		initialize: function( options ) {
			this.$el.html( "<h2>Gist Edit View!</h2>" );
		}
	});

	return GistEditView;
});