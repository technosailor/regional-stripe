<?php
namespace RegionalStripe\Stripe;

use RegionalStripe\Utilities;

function register_shortcode( $atts ) {
	$atts = shortcode_atts( [
		'amount'    => 50,
		'name'      => get_bloginfo( 'name' ),
		'description' => '',
		'verifyPostal' => true
	], $atts );

	$apikey = ( Utilities\is_live() ) ? Utilities\get_live_publishable_key() : Utilities\get_test_publishable_key();
	$amount = str_replace( '.', '', $atts['amount'] );

	ob_start();
	?>
	<form action="" method="POST">
		<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="<?php echo esc_attr( $apikey ) ?>"
			data-amount="<?php echo esc_attr( (int) $amount ) ?>"
			data-name="<?php echo esc_attr( $atts['name'] ) ?>"
			data-description="<?php echo esc_attr( (int) $atts['description'] ) ?>"
			data-image="https://s3.amazonaws.com/stripe-uploads/acct_18cN1QLahYbeRp0amerchant-icon-1469745486696-LFCBox%2021231%20crest.jpg"
			data-locale="auto"
			<?php echo ( $atts['verifyPostal'] ) ? ' data-zip-code="true"' : '' ?>
		>
		</script>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'regstr_stripe', __NAMESPACE__ . '\register_shortcode' );