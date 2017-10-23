<?php
// Woocommerce CALL
// Step 1
if(!function_exists('wdm_add_item_data'))
{
    function wdm_add_item_data($cart_item_data,$product_id)
    {
        global $woocommerce;
        session_start();	        
        $new_value = array();
        if (isset($_SESSION['custom_data_1'])) {
            $option1 = $_SESSION['custom_data_1'];
            $new_value['custom_data_1'] =  $option1;
            unset($_SESSION['custom_data_1']);
        }
        if (isset($_SESSION['custom_data_2'])) {
            $option2 = $_SESSION['custom_data_2'];
            $new_value['custom_data_2'] =  $option2;
            unset($_SESSION['custom_data_2']);
        }
        if (isset($_SESSION['custom_data_3'])) {
            $option3 = $_SESSION['custom_data_3'];
            $new_value['custom_data_3'] =  $option3;
            unset($_SESSION['custom_data_3']);
        }
        if (isset($_SESSION['custom_data_4'])) {
            $option4 = $_SESSION['custom_data_4'];
            $new_value['custom_data_4'] =  $option4;
            unset($_SESSION['custom_data_4']);
        }
        if (isset($_SESSION['custom_data_5'])) {
            $option5 = $_SESSION['custom_data_5'];
            $new_value['custom_data_5'] =  $option5;
            unset($_SESSION['custom_data_5']);
        }
        if (isset($_SESSION['custom_data_6'])) {
            $option6 = $_SESSION['custom_data_6'];
            $new_value['custom_data_6'] =  $option6;
            unset($_SESSION['custom_data_6']);
        }
        if (isset($_SESSION['custom_data_7'])) {
            $option7 = $_SESSION['custom_data_7'];
            $new_value['custom_data_7'] =  $option7;
            unset($_SESSION['custom_data_7']);
        }
        if (isset($_SESSION['custom_data_8'])) {
            $option8 = $_SESSION['custom_data_8'];
            $new_value['custom_data_8'] =  $option8;
            unset($_SESSION['custom_data_8']);

        }
        if (isset($_SESSION['vocher_price'])) {
            $price = $_SESSION['vocher_price'];
            $new_value['price'] =  $price;
            unset($_SESSION['vocher_price']);

        }	        
        if( empty($option2) && empty($option7) )
            return $cart_item_data;
        else
        {
            if(empty($cart_item_data))
                return $new_value;
            else
                return array_merge($cart_item_data,$new_value);
        }
    }
}
add_filter('woocommerce_add_cart_item_data','wdm_add_item_data', 1, 2);

// step 2	
if(!function_exists('wdm_get_cart_items_from_session'))
{
    function wdm_get_cart_items_from_session($item,$values,$key)
    {
        if (array_key_exists( 'custom_data_1', $values ) )
        {
            $item['custom_data_1'] = $values['custom_data_1'];
        }
        if (array_key_exists( 'custom_data_2', $values ) )
        {
            $item['custom_data_2'] = $values['custom_data_2'];
        }
        if (array_key_exists( 'custom_data_3', $values ) )
        {
            $item['custom_data_3'] = $values['custom_data_3'];
        }
        if (array_key_exists( 'custom_data_4', $values ) )
        {
            $item['custom_data_4'] = $values['custom_data_4'];
        }
        if (array_key_exists( 'custom_data_5', $values ) )
        {
            $item['custom_data_5'] = $values['custom_data_5'];
        }
        if (array_key_exists( 'custom_data_6', $values ) )
        {
            $item['custom_data_6'] = $values['custom_data_6'];
        }
        if (array_key_exists( 'custom_data_7', $values ) )
        {
            $item['custom_data_7'] = $values['custom_data_7'];
        }
        if (array_key_exists( 'custom_data_8', $values ) )
        {
            $item['custom_data_8'] = $values['custom_data_8'];
        }
        if (array_key_exists( 'price', $values ) )
        {
            $item['price'] = $values['price'];
        }	        
        return $item;
    }
}
add_filter('woocommerce_get_cart_item_from_session', 'wdm_get_cart_items_from_session', 1, 3 );

// step 3
if(!function_exists('wdm_add_user_custom_option_from_session_into_cart'))
{
    function wdm_add_user_custom_option_from_session_into_cart($product_name, $values, $cart_item_key )
    {
        if(count($values['custom_data_2']) > 0)
        {
        	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $values['custom_data_2'].'_'.$values['product_id'].'_'.time());
            $return_string = $product_name . "</a><div class='data-vouc'><dl class='variation'>";
            $return_string .= "
            	<div class='bt_bb_tabs bt_bb_color_scheme_1 bt_bb_style_outline bt_bb_shape_square'>
            		<ul class='bt_bb_tabs_header'>
            			<li class='Test' id='panel_header_".$slug."' style='margin-top: 0 !important; cursor: pointer;'>
            				<span>Details</span>
            			</li>
            		</ul>
            		<div class='bt_bb_tabs_tabs'>
            			<div class='bt_bb_tab_item' id='panel_content_".$slug."'>
            				<div class='bt_bb_tab_content'>
            					<div class='bt_bb_service bt_bb_style_outline bt_bb_size_small bt_bb_shape_circle bt_bb_align_inherit'><table class='wdm_options_table' id='" . $values['product_id'] . "'>";
            if (isset($values['custom_data_1']) && $values['custom_data_1'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> TYPE : " . $values['custom_data_1'] . "</td></tr>";
            }	            	            
            if (isset($values['custom_data_2']) && $values['custom_data_2'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> Recipient Name : " . $values['custom_data_2'] . "</td></tr>";
            }	            
            if (isset($values['custom_data_8']) && $values['custom_data_8'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> Recipient Email : " . $values['custom_data_8'] . "</td></tr>";
            }	            
            if (isset($values['custom_data_3']) && $values['custom_data_3'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> Recipient Address : " . $values['custom_data_3'] . "</td></tr>";
            }	            
            if (isset($values['custom_data_4']) && $values['custom_data_4'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> Recipient Suburb : " . $values['custom_data_4'] . "</td></tr>";
            }	            	            
            if (isset($values['custom_data_6']) && $values['custom_data_6'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> Recipient Postcode : " . $values['custom_data_6'] . "</td></tr>";
            }	         
            // if (isset($values['custom_data_5']) && $values['custom_data_5'] != '') {
            // 	$return_string .= "<tr style='font-size: 12px;'><td> Recipient State : " . $values['custom_data_5'] . "</td></tr>";
            // }	            	            	            
            if (isset($values['custom_data_7']) && $values['custom_data_7'] != '') {
            	$return_string .= "<tr style='font-size: 12px;'><td> Message to Recipient : " . $values['custom_data_7'] . "</td></tr>";
            }	            	            	            	            
            $return_string .= "</table></div></div></div></div></div></dl>
				<script>
					jQuery(document).ready(function($) {
						$(window).load(function() {
							$('.bt_bb_tabs_header li').removeClass('on');
							$('.bt_bb_tab_item').removeClass('on');
						});

						$('#panel_header_".$slug."').click(function() {
							//$('#panel_header_".$slug."').toggleClass('on');
							$('#panel_content_".$slug."').toggle();
						});							
					});
				</script>
            </div>";
            return $return_string;
        }
        else
        {
            return $product_name;
        }
    }
}
add_filter('woocommerce_checkout_cart_item_quantity','wdm_add_user_custom_option_from_session_into_cart',1,3);
add_filter('woocommerce_cart_item_price','wdm_add_user_custom_option_from_session_into_cart',1,3);

// step 4
if(!function_exists('wdm_add_values_to_order_item_meta'))
{
    function wdm_add_values_to_order_item_meta($item_id, $values)
    {
        global $woocommerce,$wpdb;
        $user_custom_values = $values['wdm_user_custom_data_value'];
        if(!empty($user_custom_values))
        {
            wc_add_order_item_meta($item_id,'wdm_user_custom_data',$user_custom_values);
        }
        $custom_data_1 = $values['custom_data_1'];
        if(!empty($custom_data_1))
        {
            wc_add_order_item_meta($item_id,'TYPE',$custom_data_1);
        }
        $custom_data_2 = $values['custom_data_2'];
        if(!empty($custom_data_2))
        {
            wc_add_order_item_meta($item_id,'Recipient Name',$custom_data_2);
        }
        $custom_data_3 = $values['custom_data_3'];
        if(!empty($custom_data_3))
        {
            wc_add_order_item_meta($item_id,'Recipient Address',$custom_data_3);
        }
        $custom_data_4 = $values['custom_data_4'];
        if(!empty($custom_data_4))
        {
            wc_add_order_item_meta($item_id,'Recipient Suburb',$custom_data_4);
        }
        $custom_data_5 = $values['custom_data_5'];
        if(!empty($custom_data_5))
        {
            wc_add_order_item_meta($item_id,'custom_data_5',$custom_data_5);
        }
        $custom_data_6 = $values['custom_data_6'];
        if(!empty($custom_data_6))
        {
            wc_add_order_item_meta($item_id,'Recipient Postcode',$custom_data_6);
        }
        $custom_data_7 = $values['custom_data_7'];
        if(!empty($custom_data_7))
        {
            wc_add_order_item_meta($item_id,'Message to Recipient',$custom_data_7);
        }	        
        $custom_data_8 = $values['custom_data_8'];
        if(!empty($custom_data_8))
        {
            wc_add_order_item_meta($item_id,'Recipient Email',$custom_data_8);
        }	        
        $price = $values['price'];
        if(!empty($price))
        {
            wc_add_order_item_meta($item_id,'price',$price);
        }	        	        
    }
}
add_action('woocommerce_add_order_item_meta','wdm_add_values_to_order_item_meta',1,2);

add_action( 'woocommerce_before_calculate_totals', 'update_custom_price', 1, 1 );
function update_custom_price( $cart_object ) {
    foreach ( $cart_object->cart_contents as $cart_item_key => $value ) {
    	if (isset($value['price']) || $value['price'] != '' || $value['price'] != 0) {
            if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
                $value['data']->price = $value['price'];
            } else {
                $value['data']->set_price($value['price']);
            }	    		
    	}
    }
}	

// step 5	
if(!function_exists('wdm_remove_user_custom_data_options_from_cart'))
{
    function wdm_remove_user_custom_data_options_from_cart($cart_item_key)
    {
        global $woocommerce;
        $cart = $woocommerce->cart->get_cart();
        foreach( $cart as $key => $values)
        {
            if ( $values['wdm_user_custom_data_value'] == $cart_item_key )
                unset( $woocommerce->cart->cart_contents[ $key ] );
        }
    }
}
add_action('woocommerce_before_cart_item_quantity_zero','wdm_remove_user_custom_data_options_from_cart',1,1);