<?php
/**
 * Our Gist object
 */

class Gist {

	public static $post_type = 'gist';

	private $_post;

	public function __construct( WP_Post $post ) {

		$this->_post = $post;

	}

	/**
	 * Get the ID for this gist
	 * 
	 * @return int
	 */
	public function get_id() {
		return $this->_post->ID;
	}

	/**
	 * Get the content of this Gist
	 * 
	 * @return string
	 */
	public function get_content() {
		return $this->_post->post_content;
	}

	/**
	 * Get the description for this Gist
	 *
	 * @return string
	 */
	public function get_description() {
		return $this->_post->post_excerpt;
	}

	/**
	 * Get the permalink for this Gist
	 * 
	 * @return string
	 */
	public function get_permalink() {
		return apply_filters( 'the_permalink', get_permalink( $this->get_id() ) );
	}

	/**
	 * Create a Gist
	 * 
	 * @return object|WP_Error
	 */
	public function create( $args ) {

		$defaults = array(
			'content'          => '',
			'description'      => '',
			);
		$args = array_merge( $defaults, $args );

		$post = array(
			'post_content'     => $args['content'],
			'post_excerpt'     => $args['excerpt'],
			'post_type'        => self::$post_type,
			);
		$post_id = wp_insert_post( $post );
		if ( is_wp_error( $post_id ) ) {
			return $post_id;
		}

		$post = get_post( $post_id );
		return new Gist( $post );
	}

	/**
	 * Export all of the fields for the API
	 */
	public function export_for_api() {
		return array(
			'id'               => $this->get_id(),
			'content'          => $this->get_content(),
			'description'      => $this->get_description(),
			'permalink'        => $this->get_permalink(),
			);
	}

}