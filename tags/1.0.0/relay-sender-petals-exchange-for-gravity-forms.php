<?php

/**
 * Plugin Name: Relay Sender - Petals Exchange for Gravity Forms
 * Plugin URI: https://docs.bkbn.au/v/pgf/
 * Description: Integrates the Petals Exchange with Gravity Forms
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: BAKKBONE Australia
 * Author URI: https://www.bakkbone.com.au/
 * License: GNU General Public License (GPL) 3.0 or later
 * License URI: https://www.gnu.org/licenses/gpl.html
 * Text Domain: relay-sender-petals-exchange-for-gravity-forms
**/

define("PGF_EXEC",true);

define("PGF_DEBUG",false);

define("PGF_FILE",__FILE__);

define("PGF_PATH",dirname(__FILE__));

define("PGF_URL",plugins_url("/",__FILE__));

require PGF_PATH . '/incl/localisation.php';

define( 'PGF_VERSION', '2.0' );
 
add_filter( 'plugin_action_links_relay-sender-petals-exchange-for-gravity-forms/relay-sender-petals-exchange-for-gravity-forms.php', 'pgf_settings_link', 1, 1 );

function pgf_settings_link( $links ){
	$url = add_query_arg( array( 'page' => 'gf_settings', 'subview' => 'pgf' ), get_admin_url() . 'admin.php' );
	$new_link = array("<a href='$url'>" . PGF_SETTINGS_SHORT . '</a>');
	return array_merge($new_link, $links);
}

add_filter( 'plugin_row_meta', 'pgf_meta_links', 10, 2 );

function pgf_meta_links( $links, $file ) {

	if ( plugin_basename( PGF_FILE ) !== $file ) {
		return $links;
	}

	$format = '<a href="%1$s" title="%2$s" target="_blank">%3$s</a>';

	return array_merge(
		$links,
		array(
			sprintf(
				$format,
				'https://docs.bkbn.au/v/pgf/',
				PGF_HELP_TITLE,
				PGF_HELP_TITLE
			)
		)
	);
}

add_action( 'gform_loaded', array( 'PGF_Init', 'load' ), 6 );

class PGF_Init {
 
    public static function load() {
 
        if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
            return;
        }
 
        require_once( 'incl/core.php' );
 
        GFAddOn::register( 'PGF' );
    }
 
}
 
function pgf() {
    return PGF::get_instance();
}