<?php get_header(); ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part('parts/content', 'banner'); ?>

            <section class="latest-news pt-5 pb-3">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gap-0">
                        <!--  Start Latest News -->
                        <?php
                        $homepageLatestNews = new WP_Query(array(
                            'posts_per_page' => 4,
                            'post_type' => 'latestnews',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                        ));
                        if ($homepageLatestNews->have_posts()):
                            while ($homepageLatestNews->have_posts()) : $homepageLatestNews->the_post();

                                get_template_part('parts/content', 'latest-news');
                            endwhile;
                            wp_reset_postdata();
                        else: ?>
                            <p>Es gibt noch nichts zu sehen!</p>
                        <?php endif; ?>
                        
                        <!--  Emd Latest News -->
                    </div>
                </div>
            </section>

            
            <?php get_template_part('parts/content', 'products'); ?>
        </main>
    </div>
</div>
<?php get_footer(); ?>