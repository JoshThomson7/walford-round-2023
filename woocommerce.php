<?php
/*
    WooCommerce template
*/
get_header();

global $post;

// AVB::avb_banners();

// Shop options
$wc_custom_shop = false; // Custom shop - false for standard Woo
$wc_custom_archive = false; // Custom shop archive (tax) - false for standard Woo
$wc_sidebar = false; // Custom sidebar - false for no sidebar
?>
    

    <section class="wc__wrapper">
        <?php
            if($wc_sidebar) {
                require_once(FL1_WOO_PATH.'templates/sidebar.php');
            }
        ?>

        <div class="wc__content<?php if($wc_sidebar && (is_shop() || is_tax(array('product_cat', 'product_tag'))  || is_search()) ) { echo ' wc__has__sidebar'; } ?>">
            <?php if($wc_sidebar): ?>
                <div class="wc__filters">
                    <a href="#" class="wc__toggle__filters"><i class="ion-android-options"></i> Filters</a>
                </div><!-- wc__filters -->
            <?php endif; ?>

            <?php
                if(is_shop() && $wc_custom_shop) {
                    require_once(FL1_WOO_PATH.'templates/shop.php');

                } else {
                    if( $wc_custom_archive && (is_shop() || is_tax(array('product_cat', 'product_tag'))) ) {
                        require_once(FL1_WOO_PATH.'templates/archive-product.php');
                    } else {
                        woocommerce_content();
                    }
                }
            ?>
        </div><!-- wc__content -->
    </section><!-- wc__wrapper -->

<?php get_footer(); ?>
