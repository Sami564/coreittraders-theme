<?php
get_header();
?>

<section class="shop-page-section">
    <div class="section-header">
        <p>SHOP</p>
        <h1>OUR PRODUCTS</h1>
        <p>Browse hardware and equipment available right now.</p>
    </div>

    <div class="woocommerce">

        <?php if ( woocommerce_product_loop() ) : ?>

            <?php
            do_action( 'woocommerce_before_shop_loop' );

            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
                    do_action( 'woocommerce_shop_loop' );
                    wc_get_template_part( 'content', 'product' );
                }
            }

            woocommerce_product_loop_end();

            do_action( 'woocommerce_after_shop_loop' );
            ?>

        <?php else : ?>

            <?php do_action( 'woocommerce_no_products_found' ); ?>

        <?php endif; ?>

    </div>
</section>

<?php
get_footer();