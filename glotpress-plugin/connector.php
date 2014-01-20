<?php

class Connector {
	private $wordpress_url = '/';
	private $permalink = false;

	function __construct() {
		if( defined( 'WORDPRESS_URL' ) ) {
			$this->wordpress_url = WORDPRESS_URL;
			
			if( defined( 'WORDPRESS_PERMALINK' ) && WORDPRESS_PERMALINK )
				$this->permalink = true;

			add_action( 'after_hello', array( $this, 'show_register_link' ) );
		}
	}

	function show_register_link() {
		$element = 'strong';

		if ( class_exists('GP_Bootstrap_Theme') ) {
			$element = 'li';
		}

		if ( ! GP::$user->logged_in() ) {
			if( $this->permalink )
				echo '<' . $element . '><a href="' . $this->wordpress_url . 'register/">' . __('Register') . '</a></' . $element . '>';
			else
				echo '<' . $element . '><a href="' . $this->wordpress_url . '?gp_action=register">' . __('Register') . '</a></' . $element . '>';
		}
	}
}

new Connector;