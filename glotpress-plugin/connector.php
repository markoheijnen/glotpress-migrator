<?php

class Connector {
	private $site_url = '/wpusers/';
	private $permalink = false;

	function __construct() {
		add_action( 'after_hello', array( $this, 'show_register_link' ) );
	}

	function show_register_link() {
		if ( ! GP::$user->logged_in() ) {
			if( $this->permalink )
				echo '<strong><a href="' . $this->site_url . 'register/">' . __('Register') . '</a></strong>';
			else
				echo '<strong><a href="' . $this->site_url . '?gp_action=register">' . __('Register') . '</a></strong>';
		}
	}
}

new Connector;