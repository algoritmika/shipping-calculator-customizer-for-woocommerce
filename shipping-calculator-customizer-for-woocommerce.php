<?php
/*
Plugin Name: Shipping Calculator Customizer for WooCommerce
Plugin URI: https://wordpress.org/support/plugin/shipping-calculator-customizer-for-woocommerce/
Description: Customize WooCommerce shipping calculator on cart page. Beautifully.
Version: 2.0.1
Author: Algoritmika Ltd
Author URI: https://profiles.wordpress.org/algoritmika/
Requires at least: 4.4
Text Domain: shipping-calculator-customizer-for-woocommerce
Domain Path: /langs
WC tested up to: 9.8
Requires Plugins: woocommerce
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

defined( 'ABSPATH' ) || exit;

if ( 'shipping-calculator-customizer-for-woocommerce.php' === basename( __FILE__ ) ) {
	/**
	 * Check if Pro plugin version is activated.
	 *
	 * @version 2.0.0
	 * @since   1.2.0
	 */
	$plugin = 'shipping-calculator-customizer-for-woocommerce-pro/shipping-calculator-customizer-for-woocommerce-pro.php';
	if (
		in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) ||
		(
			is_multisite() &&
			array_key_exists( $plugin, (array) get_site_option( 'active_sitewide_plugins', array() ) )
		)
	) {
		defined( 'ALG_WC_SCC_FILE_FREE' ) || define( 'ALG_WC_SCC_FILE_FREE', __FILE__ );
		return;
	}
}

defined( 'ALG_WC_SCC_VERSION' ) || define ( 'ALG_WC_SCC_VERSION', '2.0.1' );

defined( 'ALG_WC_SCC_FILE' ) || define ( 'ALG_WC_SCC_FILE', __FILE__ );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-alg-wc-scc.php';

if ( ! function_exists( 'alg_wc_shipping_calculator_customizer' ) ) {
	/**
	 * Returns the main instance of Alg_WC_SCC to prevent the need to use globals.
	 *
	 * @version 1.2.0
	 * @since   1.0.0
	 */
	function alg_wc_shipping_calculator_customizer() {
		return Alg_WC_SCC::instance();
	}
}

add_action( 'plugins_loaded', 'alg_wc_shipping_calculator_customizer' );
