<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

$icon = $args['icon'] ?? '';
$heading = $args['heading'] ?? '';
$extra = $args['extra'] ?? '';
$contactInfo = $args['contact-info'] ?? '';

?>


<div class="contact-detail">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/./assets/icons/' . $icon . '.svg') ?>" alt="">
    <h3><?php echo esc_html( $heading ); ?></h3>
    <p><?php echo esc_html( $extra ); ?></p>
    <p><?php echo esc_html( $contactInfo ); ?></p>
</div>