<?php
/**
 * Shipping Calculator Customizer for WooCommerce - General Section Settings
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd.
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_SCC_Settings_General' ) ) :

class Alg_WC_SCC_Settings_General extends Alg_WC_SCC_Settings_Section {

	/**
	 * Constructor.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function __construct() {
		$this->id   = '';
		$this->desc = __( 'General', 'shipping-calculator-customizer-for-woocommerce' );
		parent::__construct();
	}

	/**
	 * get_settings.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function get_settings() {

		$general_settings = array(
			array(
				'title'    => __( 'General', 'shipping-calculator-customizer-for-woocommerce' ),
				'type'     => 'title',
				'id'       => 'alg_wc_shipping_calculator_general_options',
			),
			array(
				'title'    => __( 'Enable shipping calculator', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_show',
				'default'  => 'yes',
				'type'     => 'checkbox',
			),
			array(
				'title'    => __( 'Force open', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_force_block_open',
				'default'  => 'no',
				'type'     => 'checkbox',
			),
			array(
				'desc'     => __( '"Change address" button', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc_tip' => __( 'Ignored unless "Force open" option is enabled.', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_force_block_open_button',
				'default'  => 'hide',
				'type'     => 'select',
				'class'    => 'wc-enhanced-select',
				'options'  => array(
					'hide'    => __( 'Hide', 'shipping-calculator-customizer-for-woocommerce' ),
					'noclick' => __( 'Make non clickable', 'shipping-calculator-customizer-for-woocommerce' ),
				),
			),
			array(
				'type'     => 'sectionend',
				'id'       => 'alg_wc_shipping_calculator_general_options',
			),
		);

		$fields_settings = array(
			array(
				'title'    => __( 'Fields', 'shipping-calculator-customizer-for-woocommerce' ),
				'type'     => 'title',
				'id'       => 'alg_wc_shipping_calculator_fields_options',
			),
			array(
				'title'    => __( 'Country', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_country',
				'default'  => 'yes',
				'type'     => 'checkbox',
			),
			array(
				'title'    => __( 'State', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_state',
				'default'  => 'yes',
				'type'     => 'checkbox',
			),
			array(
				'title'    => __( 'City', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_city',
				'default'  => 'yes',
				'type'     => 'checkbox',
			),
			array(
				'title'    => __( 'Postcode', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_postcode',
				'default'  => 'yes',
				'type'     => 'checkbox',
			),
			array(
				'type'     => 'sectionend',
				'id'       => 'alg_wc_shipping_calculator_fields_options',
			),
		);

		$info_settings = array(
			array(
				'title'    => __( 'Custom Info', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Custom info before/after the shipping calculator.', 'shipping-calculator-customizer-for-woocommerce' ),
				'type'     => 'title',
				'id'       => 'alg_wc_shipping_calculator_info_options',
			),
			array(
				'title'    => __( 'Before', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_info_before',
				'default'  => 'no',
				'type'     => 'checkbox',
			),
			array(
				'desc_tip' => __( 'Custom info before the shipping calculator. You can use HTML and/or shortcodes here.', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_info_before',
				'default'  => '',
				'type'     => 'textarea',
				'css'      => 'height:100px;',
			),
			array(
				'title'    => __( 'After', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_enable_info_after',
				'default'  => 'no',
				'type'     => 'checkbox',
			),
			array(
				'desc_tip' => __( 'Custom info after the shipping calculator. You can use HTML and/or shortcodes here.', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_info_after',
				'default'  => '',
				'type'     => 'textarea',
				'css'      => 'height:100px;',
			),
			array(
				'type'     => 'sectionend',
				'id'       => 'alg_wc_shipping_calculator_info_options',
			),
		);

		$labels_settings = array(
			array(
				'title'    => __( 'Labels', 'shipping-calculator-customizer-for-woocommerce' ),
				'type'     => 'title',
				'id'       => 'alg_wc_shipping_calculator_labels_options',
			),
			array(
				'title'    => __( 'Labels', 'shipping-calculator-customizer-for-woocommerce' ),
				'desc'     => __( 'Enable section', 'shipping-calculator-customizer-for-woocommerce' ),
				'id'       => 'alg_wc_shipping_calculator_labels_enabled',
				'default'  => 'no',
				'type'     => 'checkbox',
			),
			array(
				'title'    => '"' . __( 'Change address', 'shipping-calculator-customizer-for-woocommerce' ) . '"',
				'id'       => 'alg_wc_shipping_calculator_label_calculate_shipping',
				'default'  => __( 'Change address', 'shipping-calculator-customizer-for-woocommerce' ),
				'type'     => 'text',
			),
			array(
				'title'    => '"' . __( 'Update', 'shipping-calculator-customizer-for-woocommerce' ) . '"',
				'id'       => 'alg_wc_shipping_calculator_label_update_totals',
				'default'  => __( 'Update', 'shipping-calculator-customizer-for-woocommerce' ),
				'type'     => 'text',
			),
			array(
				'type'     => 'sectionend',
				'id'       => 'alg_wc_shipping_calculator_labels_options',
			),
		);

		return array_merge(
			$general_settings,
			$fields_settings,
			$info_settings,
			$labels_settings
		);

	}

}

endif;

return new Alg_WC_SCC_Settings_General();
