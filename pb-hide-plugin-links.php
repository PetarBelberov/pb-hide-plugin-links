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
     * Assign everything(the hooks) as a call from within the init method
     */
    public function init()
    {
		add_filter( 'plugin_action_links', array($this, 'disable_plugin_deactivation_and_deletion' ), 10, 2);
    }

	function disable_plugin_deactivation_and_deletion( $actions, $plugin_file ) {
		if (in_array( $plugin_file, array(
		'category-ajax-filter/category-ajax-filter.php',
		// Whatever plugin you want
		)))

		unset( $actions['deactivate'] );

		if (in_array( $plugin_file, array(
			'category-ajax-filter/category-ajax-filter.php',
			// Whatever plugin you want
		)))
	
		unset( $actions['delete'] );

		return $actions;
	}
}

$servicesListing = new HidePluginLinks();
// Calling it init method outside of the class. The result is removing the coupling of the class to WordPress.
$servicesListing->init();