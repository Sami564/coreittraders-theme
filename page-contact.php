<?php
/**
 * Template Name: Contact / Query Page
 */
get_header();
?>

<section class="contact-page-section">
    <div class="section-header">
        <p>GET IN TOUCH</p>
        <h1>SEND US YOUR QUERY</h1>
        <p>Fill in your details and we'll get back to you shortly.</p>
    </div>

    <?php if ( isset( $_GET['query_status'] ) && $_GET['query_status'] === 'success' ) : ?>
        <div class="query-form-message success">
            Thank you! Your query has been submitted. We'll be in touch soon.
        </div>
    <?php elseif ( isset( $_GET['query_status'] ) && $_GET['query_status'] === 'error' ) : ?>
        <div class="query-form-message error">
            Please fill in all fields before submitting.
        </div>
    <?php endif; ?>

    <form class="query-form" method="POST" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <input type="hidden" name="action" value="coreittraders_submit_query">
        <?php wp_nonce_field( 'coreittraders_submit_query', 'coreittraders_query_nonce' ); ?>

        <label for="query_name">Name</label>
        <input type="text" name="query_name" id="query_name" required>

        <label for="query_phone">Phone Number</label>
        <input type="text" name="query_phone" id="query_phone" required>

        <label for="query_message">Your Query</label>
        <textarea name="query_message" id="query_message" rows="5" required></textarea>

        <button type="submit" class="submit-query-btn">Submit Query</button>
    </form>
</section>

<?php get_footer(); ?>