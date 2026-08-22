<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<a 
    href="<?php echo esc_url( $args['url'] ?? '#'); ?>" 
    class="<?php echo esc_attr( $args['class'] ?? ''); ?>"
>
        <?php echo esc_html( $args['text'] ?? 'Click Here'); ?>
</a>