<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<!-- Tabs -->
	<?php 
		if (CFS()->get('service') != '') {
			foreach(CFS()->get('service') as $value => $label) {
				if ($value === 'true') { ?>
					<div class="bt_bb_tabs bt_bb_color_scheme_1 bt_bb_style_outline bt_bb_shape_square">
						<ul class="bt_bb_tabs_header">
							<li style="margin-top: 0 !important;">
								<span>
								<?php if (CFS()->get('kitomba_url') != ''): ?>
									<a href="<?php echo CFS()->get('kitomba_url'); ?>" target="_blank">	Book Now</a>
								<?php else: ?>
									<a href="https://www.kitomba.com/bookings/esteem#time?services%5B0%5D%5B0%5D=2563567&services%5B0%5D%5B1%5D=package&services%5B0%5D%5B2%5D=-1" target="_blank">	Book Now</a>
								<?php endif ?>
								</span>
							</li>
							<li style="margin-top: 0 !important;"><span>Email Voucher</span></li>
							<li class="bon" style="margin-top: 0 !important;" id="post-vc">
								<span>Post Voucher 
									<small>+
								        <?php if (CFS()->get('vouc') != '') {
		                					$vouc = CFS()->get('vouc');
		                				}else{
		                					$vouc = 5;
		                				} ?>
		                				<?php echo get_woocommerce_currency_symbol().''.$vouc; ?>
                					</small>
								</span>
							</li>
						</ul>
						<div class="bt_bb_tabs_tabs">
							<div class="bt_bb_tab_item">
								<div class="bt_bb_tab_content">
									<div class="bt_bb_service bt_bb_style_outline bt_bb_size_small bt_bb_shape_circle bt_bb_align_inherit">
										<!-- Tab 1 -->
									</div>
								</div>
							</div>
							<div class="bt_bb_tab_item">
								<div class="bt_bb_tab_content">
									<div class="bt_bb_service bt_bb_style_outline bt_bb_size_small bt_bb_shape_circle bt_bb_align_inherit">
										<!-- Tab 3 -->
										<form class="cart myform" method="post" enctype='multipart/form-data' id="commentform">
											<?php
												/**
												 * @since 2.1.0.
												 */
												do_action( 'woocommerce_before_add_to_cart_button' );

												/**
												 * @since 3.0.0.
												 */
												do_action( 'woocommerce_before_add_to_cart_quantity' );
												?>

												<input type="hidden" name="custom_data_8" value="Email Voucher" id="custom_data_8">

				<!-- 								<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_8" style="text-align: left !important;">Nearest Store: <span class="required">*</span></label> 
										            <select name="custom_data_8" id="custom_data_8" class="comment-form__field" required="required">
										            	<option value="">-- Select Nearest Store --</option>
										            	<option value="BREAKFAST POINT">BREAKFAST POINT</option>
										            	<option value="AVALON">AVALON</option>
										            	<option value="BEECROFT">BEECROFT</option>
										            </select>
												</p>
				 -->
												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_9" style="text-align: left !important;">Recipient Name: <span class="required">*</span></label> 
													<input type="text" name="custom_data_9" id="custom_data_9" class="comment-form__field" required="required"><br>
												</p>													

												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_10" style="text-align: left !important;">Recipient Email: <span class="required">*</span></label> 
													<input type="email" name="custom_data_10" id="custom_data_10" class="comment-form__field" required="required"><br>
												</p>													

												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_11" style="text-align: left !important;">Message: <span class="required">*</span></label> 
													<textarea name="custom_data_11" id="custom_data_11" cols="30" rows="10" class="comment-form__field" required="required"></textarea>
												</p>																					

												<?php

												woocommerce_quantity_input( array(
													'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
													'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
													'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
												) );

												/**
												 * @since 3.0.0.
												 */
												do_action( 'woocommerce_after_add_to_cart_quantity' );
											?>

											<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

											<?php
												/**
												 * @since 2.1.0.
												 */
												do_action( 'woocommerce_after_add_to_cart_button' );
											?>
										</form>	
										<!-- Tab 3 -->
									</div>
								</div>
							</div>							
							<div class="bt_bb_tab_item" style="display:block;">
								<div class="bt_bb_tab_content">
									<div class="bt_bb_service bt_bb_style_outline bt_bb_size_small bt_bb_shape_circle bt_bb_align_inherit">
										<!-- Tab 2 -->
										<form class="cart myform" method="post" enctype='multipart/form-data' id="commentform">
											<?php
												/**
												 * @since 2.1.0.
												 */
												do_action( 'woocommerce_before_add_to_cart_button' );

												/**
												 * @since 3.0.0.
												 */
												do_action( 'woocommerce_before_add_to_cart_quantity' );
												?>
				<!-- 								<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_1" style="text-align: left !important;">Nearest Store: <span class="required">*</span></label> 
										            <select name="custom_data_1" id="custom_data_1" class="comment-form__field" required="required">
										            	<option value="">-- Select Nearest Store --</option>
										            	<option value="BREAKFAST POINT">BREAKFAST POINT</option>
										            	<option value="AVALON">AVALON</option>
										            	<option value="BEECROFT">BEECROFT</option>
										            </select>
												</p>
				 -->

				 								<input type="hidden" name="custom_data_1" value="POST Voucher" id="custom_data_1">

												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_2" style="text-align: left !important;">Recipient Name: <span class="required">*</span></label> 
													<input type="text" name="custom_data_2" id="custom_data_2" class="comment-form__field" required="required"><br>
												</p>								

												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_3" style="text-align: left !important;">Recipient Address: <span class="required">*</span></label> 
													<input type="text" name="custom_data_3" id="custom_data_3" class="comment-form__field" required="required"><br>
												</p>								

												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_4" style="text-align: left !important;">Recipient Suburb: <span class="required">*</span></label> 
													<input type="text" name="custom_data_4" id="custom_data_4" class="comment-form__field" required="required"><br>
												</p>								

				<!-- 								<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_5" style="text-align: left !important;">Recipient State:  <span class="required">*</span></label> 
										            <select name="custom_data_5" id="custom_data_5" class="comment-form__field" required="required">
										            	<option value="">-- Select State --</option>
										            	<option value="AUSTRALIAN CAPITAL TERRITORY">AUSTRALIAN CAPITAL TERRITORY</option>
										            	<option value="TASMANIA">TASMANIA</option>
										            	<option value="VICTORIA">VICTORIA</option>
										            </select>
												</p>								
				 -->
												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_6" style="text-align: left !important;">Recipient Postcode: <span class="required">*</span></label> 
													<input type="text" name="custom_data_6" id="custom_data_6" class="comment-form__field" required="required"><br>
												</p>													

												<p class="nearest-store" style="text-align: left !important;">
													<label for="custom_data_7" style="text-align: left !important;">Message to Recipient: <span class="required">*</span></label> 
													<textarea name="custom_data_7" id="custom_data_7" cols="30" rows="10" class="comment-form__field" required="required"></textarea>
												</p>													

												<?php

												woocommerce_quantity_input( array(
													'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
													'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
													'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
												) );								


												/**
												 * @since 3.0.0.
												 */
												do_action( 'woocommerce_after_add_to_cart_quantity' );
											?>

											<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

											<?php
												/**
												 * @since 2.1.0.
												 */
												do_action( 'woocommerce_after_add_to_cart_button' );
											?>
										</form>	
										<!-- Tab 2 -->
									</div>
								</div>
							</div>							
						</div>
					</div>
				<?php }else{ ?>
					<form class="cart" method="post" enctype='multipart/form-data'>
						<?php
							/**
							 * @since 2.1.0.
							 */
							do_action( 'woocommerce_before_add_to_cart_button' );

							/**
							 * @since 3.0.0.
							 */
							do_action( 'woocommerce_before_add_to_cart_quantity' );

							woocommerce_quantity_input( array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
							) );

							/**
							 * @since 3.0.0.
							 */
							do_action( 'woocommerce_after_add_to_cart_quantity' );
						?>

						<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

						<?php
							/**
							 * @since 2.1.0.
							 */
							do_action( 'woocommerce_after_add_to_cart_button' );
						?>
					</form>
				<?php }
			} 
		}else{ ?>
			<form class="cart" method="post" enctype='multipart/form-data'>
				<?php
					/**
					 * @since 2.1.0.
					 */
					do_action( 'woocommerce_before_add_to_cart_button' );

					/**
					 * @since 3.0.0.
					 */
					do_action( 'woocommerce_before_add_to_cart_quantity' );

					woocommerce_quantity_input( array(
						'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
						'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
					) );

					/**
					 * @since 3.0.0.
					 */
					do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>

				<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

				<?php
					/**
					 * @since 2.1.0.
					 */
					do_action( 'woocommerce_after_add_to_cart_button' );
				?>
			</form>
		<?php }
	?>	

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>


<script>
    jQuery(document).ready(function($){
        $('.single_add_to_cart_button').click(function() {
        var custom_data_1 = $('#custom_data_1').val();
        var custom_data_2 = $('#custom_data_2').val();
        var custom_data_3 = $('#custom_data_3').val();
        // var custom_data_4 = $('#custom_data_4').val();
        var custom_data_5 = $('#custom_data_5').val();
        var custom_data_6 = $('#custom_data_6').val();
        var custom_data_7 = $('#custom_data_7').val();
        var custom_data_8 = $('#custom_data_8').val();
        var custom_data_9 = $('#custom_data_9').val();
        var custom_data_10 = $('#custom_data_10').val();
        var custom_data_11 = $('#custom_data_11').val();

         jQuery.ajax({
            url:'<?php echo get_site_url(); ?>/wp-content/plugins/__dir_plugin__/lib/session_update.php',
            type: "POST",
            cache: false,            
            data: {
                custom_data_1 : custom_data_1,
                custom_data_2 : custom_data_2,
                custom_data_3 : custom_data_3,
                // custom_data_4 : custom_data_4,
                custom_data_5 : custom_data_5,
                custom_data_6 : custom_data_6,
                custom_data_7 : custom_data_7,
                custom_data_8 : custom_data_8,
                custom_data_9 : custom_data_9,
                custom_data_10 : custom_data_10,
                custom_data_11 : custom_data_11,
                
                // Use Plugin CFS
                <?php if (CFS()->get('vouc') != '') {
                	$vouc = CFS()->get('vouc');
                }else{
                	$vouc = 5;
                } ?>
                vocher_price: <?php echo $product->get_price() + $vouc; ?>
                // Use Plugin CFS
            },
            success:function(data){
                console.log(data);
            },
            async: false,
         });
         return true;
        });
    });
</script>