/**
 * alg-wc-shipping-calculator.js
 *
 * @version 1.1.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd.
 */

jQuery( document ).ready( alg_wc_shipping_calculator_change_labels );

jQuery( document ).ajaxComplete( alg_wc_shipping_calculator_change_labels );

function alg_wc_shipping_calculator_change_labels() {

	jQuery( 'a.shipping-calculator-button' ).each( function () {
		jQuery( this ).text( alg_wc_shipping_calculator_object.calculate_shipping_label );
		jQuery( this ).css( 'visibility', 'visible' );
	} );

	jQuery( 'button[name=calc_shipping]' ).each( function () {
		jQuery( this ).text( alg_wc_shipping_calculator_object.update_totals_label );
		jQuery( this ).css( 'visibility', 'visible' );
	} );

}
