define( ['backbone', 'handlebars', 'text!app/gists/gist_edit.mustache'], function( Backbone, Handlebars, template ) {
	'use strict';

	template = Handlebars.compile( template );

	var GistEditView = Backbone.View.extend({
		initialize: function( options ) {
			this.$el.html( template( this.model.toJSON() ) );
		}
	});

	return GistEditView;
});