<?php
/**
 * Plugin Name: GlotPress Migrate
 * Plugin URI:  http://glotpress.org
 * Description: A nice plugin that lets you run the old GlotPress code next too the GlotPress plugin
 * Author:      The GlotPress Community
 * Author URI:  http://glotpress.org
 * Version:     1.0
 */

class GlotPress_Migrate {

	public function __construct() {
		add_filter( 'gp_prefix', array( $this, 'change_prefix' ) );
	}

	public function change_prefix() {
		return 'glotpress.gp_';
	}
}

new GlotPress_Migrate;