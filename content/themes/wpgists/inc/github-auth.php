<?php
/**
 * Easy authentication with Github
 */

/**
 * A standard sign-in link that can be used
 *
 * @return string
 */
function wpgists_get_github_signin_link() {
	return home_url( 'auth/login/github' );
}


add_action( 'init', function() {

	// Redirect to Github for authorization
	if ( 0 === stripos( $_SERVER['REQUEST_URI'], '/auth/github/login' ) ) {

		$current_state = get_transient( 'github_state' );
		if ( ! $current_state ) {
			$current_state = md5( wp_generate_password() );
		}
		set_transient( 'github_state', $current_state, 60 * 3 );
		$args = array(
			'client_id'       => GITHUB_CLIENT_ID,
			'redirect_uri'    => home_url( 'auth/github/callback' ),
			'state'           => $current_state,
			);
		wp_redirect( add_query_arg( $args, 'https://github.com/login/oauth/authorize' ) );
		exit;
	}

	// Handle a request from Github
	if ( 0 === stripos( $_SERVER['REQUEST_URI'], '/auth/github/callback' ) ) {

		$current_state = get_transient( 'github_state' );
		if ( ! $current_state
			|| $current_state !== $_GET['state'] ) {
			echo "Error accepting callback.";
			exit;
		}

		// Get the authorization token
		$request_args = array(
			'body' => array(
				'client_id'       => GITHUB_CLIENT_ID,
				'client_secret'   => GITHUB_CLIENT_SECRET,
				'code'            => $_GET['code'],
				'redirect_uri'    => home_url( 'auth/github/callback' )
				),
			);
		$response = wp_remote_post( 'https://github.com/login/oauth/access_token', $request_args );

		if ( 200 !== wp_remote_retrieve_response_code( $response ) ) {
			echo "Error getting authorization token.";
			exit;
		}

		$body = wp_remote_retrieve_body( $response );

	}




});
