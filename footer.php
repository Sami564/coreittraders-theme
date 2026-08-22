    <footer class="footer-section">
        <div class="footer-contact-header">
            <p>CONTACT</p>
            <h1>REACH US</h1>
            <p>A real person answers. A real solution follows.</p>
        </div>
        <div class="footer-contact-details">
            <?php
                get_template_part( "template-parts/contact-detail" , null, [
                    'icon' => 'mail-icon',
                    'heading' => 'EMAIL',
                    'extra' => 'Send us requirements and we will reply within an hour.',
                    'contact-info' => 'info@coreittraders.pk'
                ]);
            ?>
            <?php
                get_template_part( "template-parts/contact-detail" , null, [
                    'icon' => 'chat-speech-bubble-icon',
                    'heading' => 'WHATSAPP',
                    'extra' => 'Send us a text and a technician reads your message.',
                    'contact-info' => '+92 300 1234567'
                ]);
            ?>
            <?php
                get_template_part( "template-parts/contact-detail" , null, [
                    'icon' => 'phone-icon',
                    'heading' => 'PHONE',
                    'extra' => 'Call us directly for urgent pickups and security emergencies.',
                    'contact-info' => '+92 300 1234567'
                ]);
            ?>
            <?php
                get_template_part( "template-parts/contact-detail" , null, [
                    'icon' => 'location-pin-icon',
                    'heading' => 'OFFICE',
                    'extra' => 'Visit our shop in the heart of Malir, Karachi',
                    'contact-info' => 'Shop 3 4/5, Malir Millat Garden, Karachi'
                ]);
            ?>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>