<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
/**
 * Split box component
 * 
 * @param array  $args['items']       Array of strings for the left list (e.g. ['LAPTOP', 'DESKTOP'])
 * @param string $args['icon']        Full URL to the icon (use get_template_directory_uri() when calling)
 * @param string $args['icon-alt']    Alt text for the icon
 * @param string $args['heading']     H3 heading text for the right panel
 * @param string $args['text']        Paragraph text for the right panel
 * @param string $args['button-url']  URL for the CTA button
 * @param string $args['button-text'] Button label
 */

$items       = $args['items'] ?? [];
$icon        = $args['icon'] ?? '';
$icon_alt    = $args['icon-alt'] ?? '';
$heading     = $args['heading'] ?? '';
$text        = $args['text'] ?? '';
$button_url  = $args['button-url'] ?? '/';
$button_text = $args['button-text'] ?? 'WhatsApp';
?>

<div class="split-box">
    <div class="split-list">
        <?php foreach ( $items as $item ) : ?>
            <h5 class="split-item"><?php echo esc_html( $item ); ?></h5>
        <?php endforeach; ?>
    </div>
    <div class="split-panel">
        <?php
            get_template_part( 'template-parts/img-tag', null, [
                'img-path' => $icon,
                'alt' => $icon_alt
            ]);
        ?>

        <h3>
            <?php echo esc_html( $heading ); ?>
        </h3>
        <p>
            <?php echo esc_html( $text ); ?>
        </p>
        <?php 
            get_template_part( 'template-parts/nav-button', null, [
                'url' => $button_url,
                'text' => $button_text,
                'class' => 'whatsapp-link'
            ]); 
        ?>
    </div>
</div>