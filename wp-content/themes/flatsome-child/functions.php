<?php
# Tắt tính năng tự động cập nhật Plugin WordPress
add_filter( 'auto_update_plugin', '__return_false' );
# Tắt tính năng tự động cập nhật Theme WordPress
add_filter( 'auto_update_theme', '__return_false' );

add_filter('xmlrpc_enabled', '__return_false');
add_filter('wp_headers', 'wptangtoc_remove_x_pingback');
add_filter('pings_open', '__return_false', 9999);
function wptangtoc_remove_x_pingback($headers) 
{
unset($headers['X-Pingback'], $headers['x-pingback']);
return $headers;
}

// Add custom Theme Functions here
// upload image ko cho scale nhiều ảnh
add_filter( 'big_image_size_threshold', '__return_false' );

// up load file svg
function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
function svgsUploadCheck($checked, $file, $filename, $mimes)
{
if (!$checked['type']) {
$check_filetype = wp_check_filetype($filename, $mimes);
$ext = $check_filetype['ext'];
$type = $check_filetype['type'];
$proper_filename = $filename;
if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
$ext = false;
$type = false;
}
$checked = compact('ext', 'type', 'proper_filename');
}
return $checked;
}
add_filter('wp_check_filetype_and_ext', 'svgsUploadCheck', 10, 4);

// code ẩn thông báo active key flatsome
add_action('admin_head', 'pvlan_hide_key_active');
function pvlan_hide_key_active() {
    echo '<style> div#flatsome-notice {display: none;}</style>';
	echo '<style> .notice-error {display: none;}</style>';
	echo '<style> #devvn-woocommerce-reviews-update {display: none;}</style>';
}

// tắt srcset image
function itcodewp_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'itcodewp_srcset' );


// code thêm chức năng cho sản phẩm

// code thêm Brand cho sản phẩm
function brand_pro() {
	$labels = array(
		'name'                       => 'Thương hiệu',
		'singular_name'              => 'Thương hiệu',
		'menu_name'                  => 'Thương hiệu',
		'all_items'                  => 'Tất cả thương hiệu',
		'parent_item'                => 'Thương hiệu cha',
		'parent_item_colon'          => 'Thương hiệu:',
		'new_item_name'              => 'Thêm thương hiệu',
		'add_new_item'               => 'Thêm thương hiệu',
		'edit_item'                  => 'Sửa thương hiệu',
		'update_item'                => 'Cập nhật',
		'separate_items_with_commas' => 'Phân tách thương hiệu bằng dấu phẩy',
		'search_items'               => 'Tìm thương hiệu',
		'add_or_remove_items'        => 'Thêm hoặc xóa thương hiệu',
		'choose_from_most_used'      => 'Chọn từ các Thương hiệu được sử dụng nhiều nhất',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'thuong-hieu', 'product', $args );
}
add_action( 'init', 'brand_pro', 0 );

// code thêm xuất sứ cho sản phẩm
function xuatxu() {
	$labels = array(
		'name'                       => 'Xuất xứ',
		'singular_name'              => 'Xuất xứ',
		'menu_name'                  => 'Xuất xứ',
		'all_items'                  => 'Tất cả nhà sản xuất',
		'parent_item'                => 'Xuất xứ',
		'parent_item_colon'          => 'Xuất xứ:',
		'new_item_name'              => 'Thêm nước sản xuất',
		'add_new_item'               => 'Thêm nước sản xuất',
		'edit_item'                  => 'Sửa nước sản xuất',
		'update_item'                => 'Cập nhật',
		'separate_items_with_commas' => 'Phân tách nước sản xuất bằng dấu phẩy',
		'search_items'               => 'Tìm nước sản xuất',
		'add_or_remove_items'        => 'Thêm hoặc xóa xuất xứ',
		'choose_from_most_used'      => 'Chọn từ các nhà sản xuất được sử dụng nhiều nhất',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'xuat-xu', 'product', $args );
}
add_action( 'init', 'xuatxu', 0 );

// hiển thị xuất xứ và thương hiệu ra product-small
add_action( 'flatsome_product_box_tools_bottom', 'pvlan_show_taxonomy_product_loop_item' );
function pvlan_show_taxonomy_product_loop_item() {
    global $product;
    $taxonomy = 'xuat-xu'; 
    $term_ids = wp_get_post_terms( $product->get_id(), $taxonomy, array('fields' => 'ids') );
    if ( ! empty($term_ids) ) {
        echo get_the_term_list( $product->get_id(), 'xuat-xu', '<span class="show-xuat-xu">' . _n( 'Xuất xứ:', 'Xuất xứ:', count( $term_ids ), 'woocommerce' ) . ' ', ', ', '</span>' );
    }
}

// thêm các trường vào sản phẩm
// add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_add_fields');
// function woocommerce_product_add_fields()
// {
//    global $woocommerce;
//    echo '<div class="product_custom_field">';
//    // Custom Product slogan product
//    woocommerce_wp_text_input(
//    array(
//          'id'          => 'slogan',
//          'label'       => __( 'Slogan', 'pv' ),
//          'placeholder' => __('Công dụng sản phẩm', 'pv'),
//       )
//    );
//    echo '</div>';
// }

// function woocommerce_product_fields_save($post_id) {
//   $slogan = $_POST['slogan'];
//   if (!empty($slogan) || empty($slogan))
//     update_post_meta($post_id, 'slogan', esc_html($slogan));
// }
// add_action('woocommerce_process_product_meta', 'woocommerce_product_fields_save');

// thời gian bảo hành
function pvlan_custom_fields() {
    global $woocommerce, $post;
    echo '<div class="options_group">';
    woocommerce_wp_text_input(
        array(
            'id'          => '_text_slogan',
            'label'       => __( 'Công dụng', 'woocommerce' ),
            'placeholder' => 'Công dụng sản phẩm',
        )
    );
	woocommerce_wp_text_input(
        array(
            'id'          => '_text_quycach',
            'label'       => __( 'Quy cách', 'woocommerce' ),
            'placeholder' => 'Hộp/chai bao nhiêu viên',
        )
    );
    echo '</div>';
}
add_action( 'woocommerce_product_options_reviews', 'pvlan_custom_fields' );

// lưu dữ liệu bảo hành
function pvlan_custom_field_save( $post_id ){
    $woocommerce_text_field = $_POST['_text_slogan'];
    update_post_meta( $post_id, '_text_slogan', esc_attr( $woocommerce_text_field ) );
	$woocommerce_text_field = $_POST['_text_quycach'];
    update_post_meta( $post_id, '_text_quycach', esc_attr( $woocommerce_text_field ) );
}
add_action( 'woocommerce_process_product_meta', 'pvlan_custom_field_save' );

// hiển thị ra ngoài trang chủ
function pvlan_show_text_slogan(){
    global $product;
    $data = $product->get_meta( '_text_slogan' );
    if(!empty($data)){
        echo '<div class="label-text-slogan"><span> '.$data.'</span></div>';
    }
}
add_action('flatsome_product_box_after','pvlan_show_text_slogan');

function pvlan_show_text_quycach(){
    global $product;
    $data = $product->get_meta( '_text_quycach' );
    if(!empty($data)){
        echo '<div class="label-text-quycach"><span> '.$data.'</span></div>';
    }
}
add_action('flatsome_product_box_tools_top','pvlan_show_text_quycach');


// thay đổi text button add to cart
add_filter( 'woocommerce_product_single_add_to_cart_text', 'pv_custom_cart_button_text' );
function pv_custom_cart_button_text() {
  return __( 'Chọn mua', 'woocommerce' );
}
// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Chọn Mua', 'woocommerce' );
}
//  Thêm nút mua ngay vào woocommerce

add_action('woocommerce_after_add_to_cart_button','kids_quickbuy_after_addtocart_button');
function kids_quickbuy_after_addtocart_button(){
    global $product;
    ?>
    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt btn-muangay" id="buy_now_button">
        <?php _e('<p class="title-muangay">Mua ngay</p><span class="text-muangay">Kiểm tra hàng trước khi thanh toán</span>', 'kids'); ?>
    </button>
    <input type="hidden" name="is_buy_now" id="is_buy_now" value="0" />
	<p class="goidatmua">Gọi đặt mua: <span>1900.1111</span> (Tư vấn miễn phí)</p>
    <script>
        jQuery(document).ready(function(){
            jQuery('body').on('click', '#buy_now_button', function(){
                if(jQuery(this).hasClass('disabled')) return;
                var thisParent = jQuery(this).closest('form.cart');
                jQuery('#is_buy_now', thisParent).val('1');
                thisParent.submit();
            });
        });
    </script>
    <?php
}
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url) {
    if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
        $redirect_url = wc_get_checkout_url();
    }
    return $redirect_url;
}


// code thu gọn nội dung chi tiết sản phẩm
add_action('wp_footer','itcodewp_readmore_flatsome');
function itcodewp_readmore_flatsome(){
    ?>
    <style>
        .single-product div#tab-description {
            overflow: hidden;
            position: relative;
            padding-bottom: 25px;
        }
        .single-product .tab-panels div#tab-description.panel:not(.active) {
            height: 0 !important;
        }
        .itcodewp_readmore_flatsome {
            text-align: center;
            cursor: pointer;
            position: absolute;
            z-index: 10;
            bottom: 0;
            width: 100%;
            background: #fff;
        }
        .itcodewp_readmore_flatsome:before {
            height: 55px;
            margin-top: -45px;
            content: "";
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
            display: block;
        }
        .itcodewp_readmore_flatsome a {
			color: #fff;
			display: block;
			background-color: var(--primary-color);
			padding: 6px;
			width: 150px;
			margin: auto;
			border-radius: 4px;
		}
        .itcodewp_readmore_flatsome a:after {
            content: '';
            width: 0;
            right: 0;
            border-top: 6px solid #fff;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            display: inline-block;
            vertical-align: middle;
            margin: -2px 0 0 5px;
        }
        .itcodewp_readmore_flatsome_less a:after {
            border-top: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #fff;
        }
        .itcodewp_readmore_flatsome_less:before {
            display: none;
        }
    </style>
    <script>
        (function($){
            $(document).ready(function(){
                $(window).on('load', function(){
                    if($('.single-product div#tab-description').length > 0){
                        var wrap = $('.single-product div#tab-description');
                        var current_height = wrap.height();
                        var your_height = 300;
                        if(current_height > your_height){
                            wrap.css('height', your_height+'px');
                            wrap.append(function(){
                                return '<div class="itcodewp_readmore_flatsome itcodewp_readmore_flatsome_more"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                            });
                            wrap.append(function(){
                                return '<div class="itcodewp_readmore_flatsome itcodewp_readmore_flatsome_less" style="display: none;"><a title="Xem thêm" href="javascript:void(0);">Thu gọn</a></div>';
                            });
                            $('body').on('click','.itcodewp_readmore_flatsome_more', function(){
                                wrap.removeAttr('style');
                                $('body .itcodewp_readmore_flatsome_more').hide();
                                $('body .itcodewp_readmore_flatsome_less').show();
                            });
                            $('body').on('click','.itcodewp_readmore_flatsome_less', function(){
                                wrap.css('height', your_height+'px');
                                $('body .itcodewp_readmore_flatsome_less').hide();
                                $('body .itcodewp_readmore_flatsome_more').show();
                            });
                        }
                    }
                });
            });
        })(jQuery);
    </script>
    <?php
}


// end code thêm chức năng cho sản phẩm



// code trang thanh toán
add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_form' );
function custom_checkout_form( $fields ) {
    unset($fields['billing']['billing_postcode']); //Ẩn postCode
    unset($fields['billing']['billing_state']); //Ẩn bang hạt
    unset($fields['billing']['billing_country']);// Ẩn quốc gia
    unset($fields['billing']['billing_address_2']); //billing_company
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['order_comments']);// Ẩn quốc gia
    unset($fields['billing']['billing_city']); //Ẩn select box chọn thành phố
    //unset($fields['billing']['billing_email']); //Ẩn select box chọn thành phố
     $fields['billing']['billing_first_name']['placeholder'] = "Họ và tên";
     $fields['billing']['billing_phone']['placeholder'] = "Số điện thoại";
     $fields['billing']['billing_email']['placeholder'] = "Email nhận hóa đơn";
    return $fields;
}
function custom_checkout_field_label( $fields ) {
    $fields['address_1']['label'] = 'Địa chỉ giao sản phẩm';
    $fields['first_name']['label'] = 'Tên';
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'custom_checkout_field_label' );

add_action('woocommerce_after_checkout_billing_form','pvlan_xuat_hoa_don_vat');
function pvlan_xuat_hoa_don_vat(){
    ?>
    <style>
        .pvlan_xuat_vat_wrap {
            display: none;
        }
        label.pvlan_xuat_vat_input_label {
            display: block;
            cursor: pointer;
            margin-bottom: 0;
        }
        .pvlan_xuat_vat_wrap fieldset {
            padding: 10px 0;
        }
        .pvlan_xuat_vat_wrap fieldset legend {
            background: transparent;
            padding: 0 5px;
            margin: 0 0 0 10px;
            font-size: 14px;
            display: inline;
            width: inherit;
            border: 0;
            text-transform: none;
            color: #000;
        }
        .pvlan_xuat_vat_wrap fieldset p {
            margin-bottom: 10px;
        }
        .pvlan_xuat_vat_wrap fieldset p:last-child {
            margin-bottom: 0;
        }
        .vat_active .pvlan_xuat_vat_wrap {
            display: block;
        }
    </style>
    <div class="pvlan_xuat_hoa_don_do">
        <label class="pvlan_xuat_vat_input_label">
            <input class="pvlan_xuat_vat_input" type="checkbox" name="pvlan_xuat_vat_input" value="1">
            Xuất hóa đơn VAT
        </label>
        <div class="pvlan_xuat_vat_wrap">
            <fieldset>
                <p class="form-row form-row-first" id="billing_vat_company_field">
                    <input type="text" class="input-text " name="billing_vat_company" id="billing_vat_company" placeholder="Nhập tên công ty" value="">
                </p>
                <p class="form-row form-row-last" id="billing_vat_mst_field">
                    <input type="text" class="input-text " name="billing_vat_mst" id="billing_vat_mst" placeholder="Nhập mã số thuế" value="">
                </p>
                <p class="form-row form-row-wide " id="billing_vat_companyaddress_field">
                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_vat_companyaddress" id="billing_vat_companyaddress" placeholder="Nhập địa chỉ công ty" value=""></span>
                </p>
            </fieldset>
        </div>
    </div>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                function check_vat(){
                    var parentVAT = $('input.pvlan_xuat_vat_input').closest('.pvlan_xuat_hoa_don_do');
                    if($('input.pvlan_xuat_vat_input').is(":checked")){
                        parentVAT.addClass('vat_active');
                    }else{
                        parentVAT.removeClass('vat_active');
                    }
                }
                check_vat();
                $('input.pvlan_xuat_vat_input').on('change', function () {
                    check_vat();
                });
            });
        })(jQuery);
    </script>
    <?php
}

add_action('woocommerce_checkout_process', 'vat_checkout_field_process');
function vat_checkout_field_process()
{
    if (isset($_POST['pvlan_xuat_vat_input']) && !empty($_POST['pvlan_xuat_vat_input'])) {
        if (empty($_POST['billing_vat_company'])) {
            wc_add_notice(__('Hãy nhập tên công ty') , 'error');
        }
        if (empty($_POST['billing_vat_mst'])) {
            wc_add_notice(__('Hãy nhập mã số thuế') , 'error');
        }
        if (empty($_POST['billing_vat_companyaddress'])) {
            wc_add_notice(__('Hãy nhập địa chỉ công ty') , 'error');
        }
    }
}

add_action('woocommerce_checkout_update_order_meta', 'vat_checkout_field_update_order_meta');
function vat_checkout_field_update_order_meta($order_id)
{
    if (isset($_POST['pvlan_xuat_vat_input']) && !empty($_POST['pvlan_xuat_vat_input'])) {
        update_post_meta($order_id, 'pvlan_xuat_vat_input', intval($_POST['pvlan_xuat_vat_input']));
        if (isset($_POST['billing_vat_company']) && !empty($_POST['billing_vat_company'])) {
            update_post_meta($order_id, 'billing_vat_company', sanitize_text_field($_POST['billing_vat_company']));
        }
        if (isset($_POST['billing_vat_mst']) && !empty($_POST['billing_vat_mst'])) {
            update_post_meta($order_id, 'billing_vat_mst', sanitize_text_field($_POST['billing_vat_mst']));
        }
        if (isset($_POST['billing_vat_companyaddress']) && !empty($_POST['billing_vat_companyaddress'])) {
            update_post_meta($order_id, 'billing_vat_companyaddress', sanitize_text_field($_POST['billing_vat_companyaddress']));
        }
    }
}

// Bước 4: Hiển thị thông tin VAT trong đơn hàng
// Hãy thêm code dưới đây vào file functions.php của theme bạn đang sử dụng. Ngay sau đoạn code phía trên

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'pvlan_after_shipping_address_vat', 99);
function pvlan_after_shipping_address_vat($order){
    $pvlan_xuat_vat_input = get_post_meta($order->get_id(), 'pvlan_xuat_vat_input', true);
    $billing_vat_company = get_post_meta($order->get_id(), 'billing_vat_company', true);
    $billing_vat_mst = get_post_meta($order->get_id(), 'billing_vat_mst', true);
    $billing_vat_companyaddress = get_post_meta($order->get_id(), 'billing_vat_companyaddress', true);
    ?>
    <p><strong>Xuất hóa đơn:</strong> <?php echo ($pvlan_xuat_vat_input) ? 'Có' : 'Không';?></p>
    <?php
    if($devvn_xuat_vat_input):
        ?>
        <p>
            <strong>Thông tin xuất hóa đơn:</strong><br>
            Tên công ty: <?php echo $billing_vat_company;?><br>
            Mã số thuế: <?php echo $billing_vat_mst;?><br>
            Địa chỉ: <?php echo $billing_vat_companyaddress;?><br>
        </p>
    <?php
    endif;
}


// code dịch theme
add_filter( 'gettext', function ( $strings ) {
	$text = array(
		'No file chosen' => 'Giỏ hàng',
		'Checkout details'   => 'Thông tin thanh toán',
		'Order Complete' => 'Hoàn thành đơn hàng',
		'Category Archives:' => '',
		
	);
	$strings = str_ireplace( array_keys( $text ), $text, $strings );
	return $strings;
}, 20 );

//Tùy chỉnh admin footer
function custom_admin_footer() { 
 echo 'Thiết kế bởi <a href="#" target="blank">Phương Đinh</a>';}
 add_filter('admin_footer_text', 'custom_admin_footer');

//Xóa logo wordpress
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
}

// Disable Woocommerce Header in WP Admin 
add_action('admin_head', 'Hide_WooCommerce_Breadcrumb');

function Hide_WooCommerce_Breadcrumb() {
  echo '<style>
    .woocommerce-layout__header {
        display: none;
    }
    .woocommerce-layout__activity-panel-tabs {
        display: none;
    }
    .woocommerce-layout__header-breadcrumbs {
        display: none;
    }
    .woocommerce-embed-page .woocommerce-layout__primary{
        display: none;
    }
    .woocommerce-embed-page #screen-meta, .woocommerce-embed-page #screen-meta-links{top:0;}
    </style>';
}
// Dùng trình soạn thảo cũ
add_filter( 'use_block_editor_for_post', '__return_false' );
// Dùng Widget cũ
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );