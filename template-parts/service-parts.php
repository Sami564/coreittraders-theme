<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

$icon = $args['icon'] ?? '';
$icon_alt = $args['icon-alt'] ?? '';
$heading = $args['heading'] ?? '';
$detail= $args['detail'] ?? '';
$button_url = $args['url'] ?? '';
$button_text = $args['text'] ?? '';

?>


<div class="service-part">
    <?php
        get_template_part( 'template-parts/img-tag', null, [
            'img-path' => $icon,
            'alt' => $icon_alt
        ]);
    ?>
    <h4>
        <?php echo esc_html( $heading ); ?>
    </h4>
    <p>
        <?php echo esc_html( $detail ); ?>
    </p>
    <?php 
        get_template_part( 'template-parts/nav-button', null, [
            'url' => $button_url,
            'text' => $button_text,
            'class' => 'whatsapp-link'
        ]); 
    ?>
</div>