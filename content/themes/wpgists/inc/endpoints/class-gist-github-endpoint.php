<?php

/**
 * Create a new WP Gist from an existing Github Gist
 */
class Gist_Github_Endpoint extends \H_API\Endpoints\Endpoint {

	protected $pattern = 'gist/github';
	protected $query = '';
	protected $methods = array( 'POST' );
	protected $authenticated = true;
	protected $public = true;
	protected $arguments = array(
		'gist_url'     => array(
			'sanitize_callback'    => 'esc_url_raw',
			'required'             => true,
			'methods'              => array( 'POST' )
		),
	);

	protected function post( $args ) {

		$gist = Gist::create_from_github_url( $args['gist_url'] );
		if ( is_wp_error( $gist ) ) {
			$this->send_error( $gist->get_error_message() );
		}

		$this->send_response( $gist->export_for_api() );
		
	}

}