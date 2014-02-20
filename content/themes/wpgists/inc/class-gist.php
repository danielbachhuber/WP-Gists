<?php
/**
 * Our Gist object
 */

class Gist {

	private $_post;

	public function __construct( WP_Post $post ) {

		$this->_post = $post;

	}

	/**
	 * Get the description for this Gist
	 *
	 * @return string
	 */
	public function get_description() {
		return $this->_post->post_excerpt;
	}

}