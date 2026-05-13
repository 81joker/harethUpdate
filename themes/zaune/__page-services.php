<?php

/**
 * Template Name: Services
 */
?>

<?php get_header(); ?>
        <div id="content" class="site-content">
                <main id="main" class="site-main">
                    <!-- <div class="container">
                        <div class="serivces-item"> -->
                            <?php 
                                while( have_posts() ) : the_post(); ?>    
                              <div class="serivces-page">                            
                            <?php
                                get_template_part( 'parts/content', 'page' );
                                ?>    
                            </div>                            
                            <?php
                                get_template_part( 'parts/content', 'services' );

                                if( comments_open() || get_comments_number() ){
                                    comments_template();
                                }
                                endwhile;
                            ?>                                
                        <!-- </div>
                    </div> -->
                </main>
        </div>
<?php get_footer(); ?>