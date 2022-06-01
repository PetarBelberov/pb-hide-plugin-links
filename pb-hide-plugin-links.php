<?php
/**
 * Plugin Name: Hide Plugin Links
 * Description: Hide WordPress plugin Deactivation and Delete links
 * Plugin URI: https://github.com/PetarBelberov/services-listing
 * Author: Petar Belberov
 * Author URI: https://github.com/PetarBelberov
 * Version: 1.0
 * License: GPL2
 */

class HidePluginLinks
{
    /**
     *
     * Assign everything as a call from within the constructor
     */
    public function __construct()
    {
		add_filter( 'plugin_action_links', array($this, 'disable_plugin_deactivation' ), 10, 2);
    }

	function disable_plugin_deactivation( $actions, $plugin_file ) {
		if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, array(
		'category-ajax-filter/category-ajax-filter.php',
		)))

		unset( $actions['deactivate'] );
		unset( $actions['delete'] );

		return $actions;
	}
}

$servicesListing = new HidePluginLinks();