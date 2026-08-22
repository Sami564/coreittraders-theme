<?php

function coreittraders_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'coreittraders_setup' );

function coreittraders_woocommerce_support() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'coreittraders_woocommerce_support' );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

function coreittraders_register_query_cpt() {
    register_post_type( 'query_submission', [
        'labels' => [
            'name' => 'Query Submissions',
            'singular_name' => 'Query Submission',
            'menu_name' => 'Query Submissions',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email-alt',
        'supports' => [ 'title' ],
        'capability_type' => 'post',
    ] );
}
add_action( 'init', 'coreittraders_register_query_cpt' );

function coreittraders_handle_query_submission() {
    if ( ! isset( $_POST['coreittraders_query_nonce'] ) || 
         ! wp_verify_nonce( $_POST['coreittraders_query_nonce'], 'coreittraders_submit_query' ) ) {
        return;
    }

    $name    = sanitize_text_field( $_POST['query_name'] ?? '' );
    $phone   = sanitize_text_field( $_POST['query_phone'] ?? '' );
    $message = sanitize_textarea_field( $_POST['query_message'] ?? '' );

    if ( empty( $name ) || empty( $phone ) || empty( $message ) ) {
        wp_redirect( add_query_arg( 'query_status', 'error', wp_get_referer() ) );
        exit;
    }

    $post_id = wp_insert_post( [
        'post_type'   => 'query_submission',
        'post_title'  => $name . ' - ' . date( 'Y-m-d H:i' ),
        'post_status' => 'publish',
    ] );

    if ( $post_id ) {
        update_post_meta( $post_id, 'query_phone', $phone );
        update_post_meta( $post_id, 'query_message', $message );
    }

    wp_redirect( add_query_arg( 'query_status', 'success', wp_get_referer() ) );
    exit;
}
add_action( 'admin_post_nopriv_coreittraders_submit_query', 'coreittraders_handle_query_submission' );
add_action( 'admin_post_coreittraders_submit_query', 'coreittraders_handle_query_submission' );

function coreittraders_query_columns( $columns ) {
    $columns['query_phone'] = 'Phone';
    $columns['query_message'] = 'Message';
    return $columns;
}
add_filter( 'manage_query_submission_posts_columns', 'coreittraders_query_columns' );

function coreittraders_query_column_content( $column, $post_id ) {
    if ( $column === 'query_phone' ) {
        echo esc_html( get_post_meta( $post_id, 'query_phone', true ) );
    }
    if ( $column === 'query_message' ) {
        echo esc_html( get_post_meta( $post_id, 'query_message', true ) );
    }
}
add_action( 'manage_query_submission_posts_custom_column', 'coreittraders_query_column_content', 10, 2 );

function coreittraders_export_button() {
    $screen = get_current_screen();
    if ( $screen->post_type !== 'query_submission' ) {
        return;
    }
    $export_url = wp_nonce_url(
        admin_url( 'admin-post.php?action=coreittraders_export_queries' ),
        'coreittraders_export_queries'
    );
    echo '<a href="' . esc_url( $export_url ) . '" class="page-title-action">Export to Excel (CSV)</a>';
}
add_action( 'admin_notices', function() {
    global $pagenow, $typenow;
    if ( $pagenow === 'edit.php' && $typenow === 'query_submission' ) {
        coreittraders_export_button();
    }
});

function coreittraders_handle_export() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Not allowed.' );
    }
    check_admin_referer( 'coreittraders_export_queries' );

    $queries = get_posts( [
        'post_type'   => 'query_submission',
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
    ] );

    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=query-submissions-' . date( 'Y-m-d' ) . '.csv' );

    $output = fopen( 'php://output', 'w' );
    fputcsv( $output, [ 'Name', 'Phone', 'Message', 'Date Submitted' ] );

    foreach ( $queries as $query ) {
        fputcsv( $output, [
            get_the_title( $query->ID ),
            get_post_meta( $query->ID, 'query_phone', true ),
            get_post_meta( $query->ID, 'query_message', true ),
            get_the_date( 'Y-m-d H:i', $query->ID ),
        ] );
    }

    fclose( $output );
    exit;
}
add_action( 'admin_post_coreittraders_export_queries', 'coreittraders_handle_export' );

function coreittraders_enqueue_assets() {
    wp_enqueue_style(
        'coreittraders-style',
        get_stylesheet_uri(),
        [ 'wp-block-library' ],
        filemtime( get_template_directory() . '/style.css' )
    );

    wp_enqueue_style(
        'coreittraders-header',
        get_template_directory_uri() . '/assets/css/header.css',
        [],
        filemtime( get_template_directory() . '/assets/css/header.css')
    );

    wp_enqueue_style(
        'coreittraders-util',
        get_template_directory_uri() . '/assets/css/util.css',
        [],
        filemtime( get_template_directory() . '/assets/css/util.css')
    );

    wp_enqueue_style(
        'coreittraders-hero-section',
        get_template_directory_uri() . '/assets/css/hero-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/hero-section.css')
    );

    wp_enqueue_style(
        'coreittraders-services-section',
        get_template_directory_uri() . '/assets/css/services-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/services-section.css')
    );

    wp_enqueue_style(
        'coreittraders-buy-section',
        get_template_directory_uri() . '/assets/css/buy-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/buy-section.css')
    );

    wp_enqueue_style(
        'coreittraders-sell-section',
        get_template_directory_uri() . '/assets/css/sell-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/sell-section.css')
    );

    wp_enqueue_style(
        'coreittraders-secure-section',
        get_template_directory_uri() . '/assets/css/secure-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/secure-section.css')
    );

    wp_enqueue_style(
        'coreittraders-why-us-section',
        get_template_directory_uri() . '/assets/css/why-us-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/why-us-section.css')
    );

    wp_enqueue_style(
        'coreittraders-footer-section',
        get_template_directory_uri() . '/assets/css/footer-section.css',
        [],
        filemtime( get_template_directory() . '/assets/css/footer-section.css')
    );

    wp_enqueue_script(
        'coreittraders-navbar',
        get_template_directory_uri() . '/assets/js/navbar.js',
        [],
        filemtime( get_template_directory() . '/assets/js/navbar.js'),
        true
    );

    wp_enqueue_style(
        'coreittraders-contact-page',
        get_template_directory_uri() . '/assets/css/contact-page.css',
        [],
        filemtime( get_template_directory() . '/assets/css/contact-page.css')
    );

    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style(
            'coreittraders-woocommerce',
            get_template_directory_uri() . '/assets/css/woocommerce.css',
            [ 'woocommerce-general' ],
            filemtime( get_template_directory() . '/assets/css/woocommerce.css')
        );
    }
}
add_action( 'wp_enqueue_scripts', 'coreittraders_enqueue_assets');

add_action('get_header', function() {
    remove_action('wp_head', '_admin_bar_bump_cb');
});

?>