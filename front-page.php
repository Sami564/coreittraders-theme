<?php
    get_header();
?>
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-section-content">
            <div>
                <h1>
                    WE TURN OLD HARDWARE <br> INTO REAL VALUE
                </h1>
            </div>
            <div>
                <p>
                    Karachi's Trusted Source for Buying, Selling and Securing IT Equipment. <br>We come to your doorstep.
                </p>
            </div>
            <div class="hero-cta">
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
        </div>
    </section>

    <!-- SERVICES SECTION -->

    <section class="services-section">
        <div class="services-details">
            <p>
                SERVICES
            </p>
            <h1>
                WHAT WE DO FOR <br>KARACHI BUSINESS <br>AND HOMES
            </h1>
            <p>
                Four ways we help you manage technology and security services. <br> Direct service, no middlemen.
            </p>
            <div>
                <button class="learn-more-button">
                    <a href="/#buy">
                        Learn More
                    </a>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/right-arrow-icon.svg" alt="right-arrow-icon">
                </button>
            </div>
        </div>
        <div class="services-img">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/cctv-camera.jpg" alt="services-section-image">
        </div>
    </section>

    <!-- BUY SECTION -->
    <section class="buy-section" id="buy">
        <?php 
            get_template_part( "template-parts/section-header" , null, [
                'section' => 'BUY',
                'heading' => 'WE BUY YOUR OLD EQUIPMENT',
                'extra' => 'Clear out your office storeroom or dispose of scrap electronics responsibly. We pay fair cash handle the heavy-lifting.'
            ]); 
        ?>

        <?php
            get_template_part( 'template-parts/split-box', null, [
                'items' => ['LAPTOP', 'DESKTOP', 'SERVERS', 'NETWORKING', 'SCRAP', 'PRINTERS'],
                'icon' => get_template_directory_uri() . "/assets/icons/shield-icon.svg",
                'icon-alt' => 'shield-icon',
                'heading' => 'BULK CORPORATE BUYOUTS DONE WITH DISCRETION AND SPEED',
                'text' => 'We dismantle entire server rooms and office floors. Your data security is our first concern.',
                'button-url' => '/submit-query/',
                'button-text' => 'WhatsApp'
            ]);
        ?>
    </section>
    
    <!-- SELL SECTION -->
    <section class="sell-section" id="sell">
        <?php 
            get_template_part( "template-parts/section-header" , null, [
                'section' => 'SELL',
                'heading' => 'HARDWARE READY FOR WORK',
                'extra' => 'Outfit your office or upgrade your home setup without breaking the bank. Every machine is tested and guaranteed'
            ]); 
        ?>

        <div class="feature-wrap">
            <div class="feature-products">
                <h5 class="selling-product">DESKTOP</h5>
                <h5 class="selling-product">SERVERS</h5>
                <h5 class="selling-product">NETWORKING</h5>
                <h5 class="selling-product">SCRAP</h5>
                <h5 class="selling-product">LAPTOP</h5>
                <h5 class="selling-product">PRINTERS</h5>
            </div>   
            <div class="sell-detail-box">
                <div class="sell-details">
                    <p>
                        REFURBISHED
                    </p>
                    <h3>
                        BUSINESS GRADE <br>REFURBISHED MACHINES <br>AT HALF THE COST
                    </h3>
                    <p>
                        Dell, HP and Lenovo workhours with fresh window installs. Built to last <br>another five years.
                    </p>
                    <?php 
                        get_template_part( 'template-parts/nav-button', null, [
                            'url' => '/submit-query/',
                            'text' => 'WhatsApp',
                            'class' => 'whatsapp-link'
                        ]);
                    ?>
                </div>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/laptop.jpg" alt="laptop" class="sell-detail-img">
            </div>
        </div>
    </section>

    <!-- SECURE SECTION -->
    <section class="secure-section" id="secure">
        <?php 
            get_template_part( "template-parts/section-header" , null, [
                'section' => 'SECURE',
                'heading' => 'EYES ON YOUR PROPERTY',
                'extra' => "A good camera system is a quiet guard. We install and maintain security that works through Karachi's heat and load shedding"
                ]); 
        ?>
        
        <?php
            get_template_part( 'template-parts/split-box', null, [
                'items' => ['CAMERAS', 'RECORDERS', 'CABLING', 'REMOTE', 'REPAIR', 'AUDIT'],
                'icon' => get_template_directory_uri() . "/assets/icons/camera-icon.svg",
                'icon-alt' => 'camera-icon',
                'heading' => 'PROFESSIONAL CCTV INSTALLATION FOR HOMES AND SHOPS',
                'text' => 'We run the wires clearly, mount the camera solidly, and configure the recorder properly. A neat job that lasts',
                'button-url' => '/submit-query/',
                'button-text' => 'WhatsApp'
            ]);
        ?>
    </section>

    <!-- WHY US SECTION -->
    <section class="service-section">
        <?php 
            get_template_part( "template-parts/section-header" , null, [
                'section' => 'WHY US',
                'heading' => 'SERVICE WE BUILT ON TRUST',
                'extra' => "Three promises that separate us from the Karachi crowd."
                ]); 
        ?>
        <div class="service-part-details">
            <?php get_template_part( 'template-parts/service-parts', null, [
                'icon' => get_template_directory_uri() . "/assets/icons/box-icon.svg",
                'icon-alt' => 'box-icon',
                'heading' => 'WE COME TO YOUR DOORSTEP',
                'detail' => 'Free pickup and delivery anywhere in the city limits',
                'url' => '/submit-query/',
                'text' => 'WhatsApp'
            ]); ?>
            <?php get_template_part( 'template-parts/service-parts', null, [
                'icon' => get_template_directory_uri() . "/assets/icons/box-icon.svg",
                'icon-alt' => 'box-icon',
                'heading' => 'A WARRANT YOU CAN SHAKE YOUR HANDS ON',
                'detail' => 'Every machine and installation is backed by our shop.',
                'url' => '/submit-query/',
                'text' => 'WhatsApp'
            ]); ?>
            <?php get_template_part( 'template-parts/service-parts', null, [
                'icon' => get_template_directory_uri() . "/assets/icons/box-icon.svg",
                'icon-alt' => 'box-icon',
                'heading' => 'A STRAIGHT QUOTE WITH NO SURPRISE',
                'detail' => 'We assess your needs and give a clear price.',
                'url' => '/submit-query/',
                'text' => 'WhatsApp'
            ]); ?>
        </div>
    </section>

    <?php
        get_footer();
    ?>