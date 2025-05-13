<?php
/**
 * Shipping Calculator Customizer for WooCommerce - Core Class
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd.
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_SCC_Core' ) ) :

class Alg_WC_SCC_Core {

	/**
	 * Constructor.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function __construct() {

		// Enable shipping calculator
		add_filter(
			'woocommerce_shipping_show_shipping_calculator',
			array( $this, 'show_shipping_calculator' ),
			PHP_INT_MAX
		);

		// Fields
		add_filter(
			'woocommerce_shipping_calculator_enable_country',
			array( $this, 'enable_country' ),
			PHP_INT_MAX
		);
		add_filter(
			'woocommerce_shipping_calculator_enable_state',
			array( $this, 'enable_state' ),
			PHP_INT_MAX
		);
		add_filter(
			'woocommerce_shipping_calculator_enable_city',
			array( $this, 'enable_city' ),
			PHP_INT_MAX
		);
		add_filter(
			'woocommerce_shipping_calculator_enable_postcode',
			array( $this, 'enable_postcode' ),
			PHP_INT_MAX
		);

		// Force open
		add_action(
			'wp_head',
			array( $this, 'force_block_open' )
		);

		// Labels
		if ( 'yes' === get_option( 'alg_wc_shipping_calculator_labels_enabled', 'no' ) ) {
			add_action(
				'wp_enqueue_scripts',
				array( $this, 'change_labels' )
			);
		}

		// Custom Info
		if ( 'yes' === get_option( 'alg_wc_shipping_calculator_enable_info_before', 'no' ) ) {
			add_action(
				'woocommerce_before_shipping_calculator',
				array( $this, 'add_custom_info_before' )
			);
		}
		if ( 'yes' === get_option( 'alg_wc_shipping_calculator_enable_info_after', 'no' ) ) {
			add_action(
				'woocommerce_after_shipping_calculator',
				array( $this, 'add_custom_info_after' )
			);
		}

	}

	/**
	 * add_custom_info_before.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function add_custom_info_before() {
		echo do_shortcode( get_option( 'alg_wc_shipping_calculator_info_before', '' ) );
	}

	/**
	 * add_custom_info_after.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function add_custom_info_after() {
		echo do_shortcode( get_option( 'alg_wc_shipping_calculator_info_after', '' ) );
	}

	/**
	 * change_labels.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function change_labels() {

		if (
			! function_exists( 'is_cart' ) ||
			! is_cart()
		) {
			return;
		}

		$min_suffix = ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ? '' : '.min' );
		$plugin_url = alg_wc_shipping_calculator_customizer()->plugin_url();
		$version    = alg_wc_shipping_calculator_customizer()->version;

		wp_enqueue_style(
			'alg-wc-shipping-calculator',
			$plugin_url . '/includes/css/alg-wc-shipping-calculator' . $min_suffix . '.css',
			array(),
			$version
		);

		wp_enqueue_script(
			'alg-wc-shipping-calculator',
			$plugin_url . '/includes/js/alg-wc-shipping-calculator'  . $min_suffix . '.js',
			array( 'jquery' ),
			$version,
			true
		);

		wp_localize_script(
			'alg-wc-shipping-calculator',
			'alg_wc_shipping_calculator_object',
			array(
				'calculate_shipping_label' => get_option(
					'alg_wc_shipping_calculator_label_calculate_shipping',
					__( 'Change address', 'woocommerce' ) // phpcs:ignore WordPress.WP.I18n.TextDomainMismatch
				),
				'update_totals_label'      => get_option(
					'alg_wc_shipping_calculator_label_update_totals',
					__( 'Update', 'woocommerce' ) // phpcs:ignore WordPress.WP.I18n.TextDomainMismatch
				),
			)
		);

	}

	/**
	 * force_block_open.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function force_block_open() {

		if ( 'no' === get_option( 'alg_wc_shipping_calculator_enable_force_block_open', 'no' ) ) {
			return;
		}

		?>
		<style type="text/css">
			.shipping-calculator-form {
				display: block !important;
			}
			<?php if ( 'hide' === get_option( 'alg_wc_shipping_calculator_enable_force_block_open_button', 'hide' ) ) { ?>
			a.shipping-calculator-button {
				display: none !important;
			}
			<?php } else { // 'noclick' ?>
			a.shipping-calculator-button {
				pointer-events: none;
				cursor: default;
			}
			<?php } ?>
		</style>
		<?php

	}

	/**
	 * enable_country.
	 *
	 * @version 1.1.0
	 * @since   1.1.0
	 */
	function enable_country() {
		return ( 'yes' === get_option( 'alg_wc_shipping_calculator_enable_country', 'yes' ) );
	}

	/**
	 * enable_state.
	 *
	 * @version 1.1.0
	 * @since   1.1.0
	 */
	function enable_state() {
		return ( 'yes' === get_option( 'alg_wc_shipping_calculator_enable_state', 'yes' ) );
	}

	/**
	 * enable_city.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function enable_city() {
		return ( 'yes' === get_option( 'alg_wc_shipping_calculator_enable_city', 'yes' ) );
	}

	/**
	 * enable_postcode.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function enable_postcode() {
		return ( 'yes' === get_option( 'alg_wc_shipping_calculator_enable_postcode', 'yes' ) );
	}

	/**
	 * show_shipping_calculator.
	 *
	 * @version 1.1.0
	 * @since   1.1.0
	 */
	function show_shipping_calculator() {
		return ( 'yes' === get_option( 'alg_wc_shipping_calculator_show', 'yes' ) );
	}

}

endif;

return new Alg_WC_SCC_Core();
