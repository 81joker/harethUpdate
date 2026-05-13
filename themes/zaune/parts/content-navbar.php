    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <!-- Logo -->
                    <a class="position-relative overflow-hidden d-flex justify-content-center align-items-center" href="<?php echo esc_url(home_url('/')); ?>"

                        style="width: 170px !important; height: 60px !important;">
                        <img src="<?= get_theme_file_uri('logo/logo.png') ?>" alt="Logo" class="img-fluid">
                    </a>

                </div>
                <div class="col-6 align-self-center">
                    <?php get_search_form() ?>
                </div>

                <div class="col-4 align-self-center text-end">
                    <!-- Icons -->
                    <div class="icons-area">
                        <?php
                        $socials_nav = [
                            'nav_facebook' => 'bi bi-facebook',
                            'nav_twitter' => 'bi bi-twitter',
                            'nav_instagram' => 'bi bi-instagram',
                            'nav_pinterest' => 'bi bi-pinterest',
                            'nav_linkedin' => 'bi bi-linkedin'
                        ];

                        foreach ($socials_nav as $network => $icon) {
                            $url = get_theme_mod($network . '_url');
                            if ($url) {
                                echo sprintf(
                                    '<a href="%s" target="_blank" class="me-2"><i class="%s"></i> %s</a>',
                                    esc_url($url),
                                    esc_attr($icon),
                                    esc_html(ucfirst(str_replace('nav_', '', $network)))
                                );
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <nav class="main-nav ps-md-4 d-block">
                <div class="row">
                    <div class="col-2 align-middle">
                        <a class="position-relative overflow-hidden d-flex justify-content-start align-items-center d-md-block d-lg-none logo-mobile" href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?= get_theme_file_uri('logo/logo.png') ?>" alt="Logo" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-10">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'zaune_main_menu',
                                'menu_class'     => 'nav',
                                'container'      => false,
                                'fallback_cb'    => false,
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>