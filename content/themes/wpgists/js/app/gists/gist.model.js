define( ['backbone'], function( Backbone ) {
	var Gist = Backbone.Model.extend({
		defaults: {
			"_nonce": wp_gists.nonce
		}
	});

	Gist.importGithubGist = function( gist_url ) {
		var deferred = Backbone.$.Deferred();

		Backbone.$.ajax({
			type:	"POST",
			url:	'/api/json/gist/github',
			data:	{ gist_url: gist_url, _nonce: wp_gists.nonce },
			success: function( data ) {
				var gist = new Gist( data );

				deferred.resolve( gist );
			}
		});

		return deferred.promise();
	};

	return Gist;
});