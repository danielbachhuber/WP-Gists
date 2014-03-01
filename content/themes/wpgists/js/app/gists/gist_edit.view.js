define( ['backbone', 'jquery', 'handlebars', 'text!app/gists/gist_edit.mustache'], function( Backbone, $, Handlebars, template ) {
	'use strict';

	template = Handlebars.compile( template );

	var GistEditView = Backbone.View.extend({
		events: {
			'click [data-control="save"]': "save",

			'blur input[data-bind]': "update",
			'blur textarea[data-bind]': "update"
		},

		initialize: function( options ) {
			this.$el.html( template( this.model.toJSON() ) );
		},

		save: function( e ) {
			console.log( "Saving..." );

			this.model.save()
				.done( function() {
					console.log( "Saved!" );	// TODO: Add proper user feedback.
				});
		},

		update: function( e ) {
			var model = this.model, $target = $( event.target ), attr = $target.attr( 'data-bind' ), value = $target.val(), updates = {};

			// Passes `null` rather than empty string.
			updates[ attr ] = ( value === '' ? null : value );

			model.set( updates );
		}
	});

	return GistEditView;
});