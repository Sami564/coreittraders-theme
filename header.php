<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <section class="navbar-section">
    <div>
        <a class="navbar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/CoreITTraders_Logo.png" alt="CoreITTraders">
        </a>
    </div>

    <button class="hamburger-toggle" id="hamburger-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="navbar-links" id="navbar-links">
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => '/#buy',
                'text' => 'We Buy',
                'class' => 'service-link'
            ]); 
        ?>
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => '/#sell',
                'text' => 'We Sell',
                'class' => 'service-link'
            ]); 
        ?>
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => '/#secure',
                'text' => 'We Secure',
                'class' => 'service-link'
            ]); 
        ?>
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => '/shop/',
                'text' => 'Shop',
                'class' => 'service-link'
            ]); 
        ?>
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => 'tel:+923001234567',
                'text' => 'Call',
                'class' => 'call-link'
            ]); 
        ?>
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => '/submit-query/',
                'text' => 'WhatsApp',
                'class' => 'whatsapp-link'
            ]); 
        ?>
    </div>
</section>