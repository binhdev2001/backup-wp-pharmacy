<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main>

<footer id="footer" class="footer-wrapper">

	<?php do_action('flatsome_footer'); ?>

</footer>

</div>

<?php wp_footer(); ?>

<!-- code xem thêm và thu ngọn mô tả ngắn chi tiết sản phẩm -->
<script type="text/javascript">
    jQuery(document).ready(function () { 
        var node = document.createElement("LI");
        var textnode = document.createTextNode("Water");
        node.appendChild(textnode);
        jQuery(".showhiden").append('<p class="xemthem"><span class="dashicons dashicons-plus-alt2"></span> Xem thêm</p>');
        jQuery(".showhiden").append('<p class="rutgon"><span class="dashicons dashicons-minus"></span> Rút gọn</p>');
        jQuery('.showhiden p.rutgon').addClass('hidden');

        jQuery('.showhiden p.xemthem').on('click', function(){
            jQuery('.showhiden .product-short-description').addClass('morong');
            jQuery('.showhiden p.rutgon').addClass('show');
            jQuery(this).addClass('hidden');
        });
        jQuery('.showhiden p.rutgon').on('click', function(){
			jQuery('.showhiden .product-short-description').removeClass('morong');
			jQuery('.showhiden p.xemthem').removeClass('hidden');
			jQuery(this).removeClass('show');
		});
	
		jQuery("p.xemthem").click(function(){
			jQuery(".dmsp-chitiet .divclick").removeClass("divclick");
			jQuery("#cat-pro").toggleClass("divclick");
		});
	});
</script>


</body>
</html>
