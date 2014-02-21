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
	 * Get the Github URL for this gist
	 * 
	 * @return string
	 */
	public function get_github_url() {
		return $this->get_meta( 'github_url' );
	}

	/**
	 * Set the Github URL for this gist
	 */
	public function set_github_url( $github_url ) {
		$this->set_meta( 'github_url', $github_url );
	}

	/**
	 * Create a Gist
	 * 
	 * @param array
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
			'post_excerpt'     => $args['description'],
			'post_type'        => self::$post_type,
			'post_status'      => 'publish',
			);
		$post_id = wp_insert_post( $post, true );

		if ( is_wp_error( $post_id ) ) {
			return $post_id;
		}

		$post = get_post( $post_id );

		$gist = new Gist( $post );

		if ( isset( $args['github_url'] ) ) {
			$gist->set_github_url( $args['github_url'] );
		}

		return new Gist( $post );
	}

	/**
	 * Create a Gist from an existing Github gist URL
	 * 
	 * @param string $gist_url
	 * @return object|WP_Error
	 */
	public function create_from_github_url( $gist_url ) {

		if ( 'gist.github.com' !== parse_url( $gist_url, PHP_URL_HOST ) ) {
			return new WP_Error( 'invalid-github-url', __( 'Invalid Github Gist URL', 'wpgists' ) );
		}

		preg_match( '#https?://gist\.github\.com/([\w]+)/([\w]+)#i', $gist_url, $matches );
		$gist_id = $matches[2];

		$gist_data = wp_remote_get( sprintf( 'https://api.github.com/gists/%s', $gist_id ) );
		if ( is_wp_error( $gist_data ) ) {
			return $gist_data;
		}

		$gist_obj = json_decode( wp_remote_retrieve_body( $gist_data ) );

		// Only support importing the first Gist for now
		foreach( $gist_obj->files as $key => $value ) {
			$first_gist = $value;
			break;
		}

		$args = array(
			'content'       => $first_gist->content,
			'description'   => $first_gist->description,
			'github_url'    => $gist_url
			);
		return Gist::create( $args );
	}

	/**
	 * Get a meta value for this Gist
	 *
	 * @param string $key
	 * @param bool $single
	 */
	private function get_meta( $key, $single = true ) {
		return get_post_meta( $this->get_id(), $key, $single );
	}

	/**
	 * Set a meta value for this Gist
	 * 
	 * @param string $key
	 * @param string $value
	 */
	private function set_meta( $key, $value ) {
		update_post_meta( $this->get_id(), $key, $value );
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