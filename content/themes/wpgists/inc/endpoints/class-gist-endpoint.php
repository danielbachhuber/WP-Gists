<?php

/**
 * Get and update a Gist
 */
class Gist_Endpoint extends \H_API\Endpoints\Endpoint {

	protected $pattern = 'gist/{POST_ID}';
	protected $query = 'post_id=$matches[1]';
	protected $methods = array( 'GET', 'POST', 'DELETE' );
	protected $authenticated = true;
	protected $public = true;
	protected $arguments = array(
		'title' => array(
			'sanitize_callback' => 'sanitize_text_field',
			'required' => false,
			'methods' => array( 'POST' )
		),
		'content' => array(
			'sanitize_callback' => 'wp_filter_kses_post',
			'required' => false,
			'methods' => array( 'POST' )
		)
	);

	protected function get( $args ) {

		$gist = new Gist( $this->post );

		$this->send_response( $gist->export_for_api() );

	}

	protected function post( $args ) {

		// Check that the user has permission
		
	}

	protected function delete() {
		wp_trash_post( $this->post->ID, true );
	}

	protected function validate_query_vars( $query_vars ) {

		parent::validate_query_vars( $query_vars );

		$post = get_post( $query_vars['post_id'] );

	}
}