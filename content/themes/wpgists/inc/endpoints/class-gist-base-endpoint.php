<?php

class Gist_Base_Endpoint extends \H_API\Endpoints\Endpoint {

	protected $pattern = 'gist';
	protected $methods = array( 'GET', 'POST' );
	protected $authenticated = true;
	protected $public = true;
	protected $arguments = array(
		'content'       => array(
			'sanitize_callback'     => false,
			'required'              => true,
			'methods'               => array( 'POST' )
		),
		'description'   => array(
			'sanitize_callback'     => 'wp_filter_nohtml_kses',
			'required'              => false,
			'methods'               => array( 'POST' )
		)
	);

	/**
	 * Get all gists
	 */
	protected function get() {

		// @todo implement

	}

	/**
	 * Create a new gist
	 */
	protected function post( $args ) {

		$gist = Gist::create( $args );

		if ( is_wp_error( $gist ) ) {
			$this->send_error( $gist->get_error_message() );
		}

		$this->send_response( $gist->export_for_api() );
	}

}