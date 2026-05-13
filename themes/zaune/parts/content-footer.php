    <!-- Footer Start -->
    <div class="footer">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">
                        <h4 class="mb-4 text-white">Newsletter</h4>
                        <p class="mb-4">Bleiben Sie mit unserem Newsletter auf dem Laufenden.</p>
                        <div class="position-relative mx-auto">
                              <form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input type="hidden" name="na" value="s">
                                <input type="hidden" name="nlang" value="">
                                
                                <input class="form-control border-0 bg-secondary w-100 py-3 ps-4 pe-5"
                                    type="email" name="ne" placeholder="Enter your email" required>

                                <button type="submit"
                                        class="btn-hover-bg btn btn-primary position-absolute top-0 end-0 py-2 mt-2 me-2">
                                 Melden Sie sich an
                                </butt>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <!-- <h4 class="mb-4 text-white">Our Services</h4> -->
                        <?php
                        if (has_nav_menu('zaune_footer_menu_first')) {
                            wp_nav_menu(array(
                                'theme_location' => 'zaune_footer_menu_first',
                                'container' => 'false',
                                'container_class' => 'footer-container',
                                // 'menu_class' => 'menu-container',
                                'walker' => new My_Custom_Walker_Nav_Menu(),
                            ));
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <!-- <h4 class="mb-4 text-white">Volunteer</h4> -->
                        <?php
                        if (has_nav_menu('zaune_footer_menu_second')) {
                            wp_nav_menu(array(
                                'theme_location' => 'zaune_footer_menu_second',
                                'container' => 'false',
                                'container_class' => 'footer-container',
                                // 'menu_class' => 'menu-container',
                                'walker' => new My_Custom_Walker_Nav_Menu(),
                            ));
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">
                        <h4 class="mb-4 text-white">Bildergalerie</h4>
                        <div class="row g-2">
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <?php if (get_theme_mod("footer_gallery_image_$i")) : ?>
                                    <div class="col-4">
                                        <div class="footer-gallery">
                                            <img src="<?php echo esc_url(get_theme_mod("footer_gallery_image_$i")); ?>" class="img-fluid w-100" alt="<?php esc_attr_e('Footer Gallery Image', 'zaune'); ?>">
                                            <div class="footer-search-icon">
                                                <a href="<?php echo esc_url(get_theme_mod("footer_gallery_image_$i")); ?>" data-lightbox="footerGallery-1" class="my-auto">
                                                    <i class="fas fa-search-plus text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4  mt-md-5 mb-0 text-white">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-4 text-center text-md-start mb-md-0 set_copyright">
                        <!-- <span> -->
                        <a href="https://www.diezaunprofis.at/" class="text-white"><i class="fas fa-copyright text-light me-2"> </i>Zäune</a>,
                        <?php echo esc_html(get_theme_mod('set_copyright', __('Copyright X - All Rights Reserved', 'zaune'))); ?>
                        <!-- </span> -->
                    </div>
                    <!-- Sart Social -->
                    <div class="col-md-4 text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <?php
                            $socials = [
                                'facebook' => 'fab fa-facebook-f',
                                'twitter' => 'fab fa-twitter',
                                'instagram' => 'fab fa-instagram',
                                'pinterest' => 'fab fa-pinterest',
                                'linkedin' => 'fab fa-linkedin-in'
                            ];

                            foreach ($socials as $network => $icon) {
                                $url = get_theme_mod($network . '_url');
                                if ($url) {
                                    echo sprintf(
                                        '<a href="%s" target="_blank" class="btn-hover-color btn-square text-white me-2"><i class="%s"></i></a>',
                                        esc_url($url),
                                        esc_attr($icon)
                                    );
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Social -->
                    <div class="col-md-4 text-center text-md-end policy">
                        <a href="<?php echo esc_url(site_url('/datenschutzerklaerung')); ?>">Datenschutz</a> |
                        <a href="<?php echo esc_url(site_url('/cookie-richtlinie')); ?>">Impressum</a> |
                        <a href="<?php echo esc_url(site_url('/agb')); ?>">AGB</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>