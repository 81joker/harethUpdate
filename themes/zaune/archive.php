<?php get_header(); ?>


        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container">
                        <div class="blog-items">
                            <?php 
                                if( have_posts() ):
                                    while( have_posts() ) : the_post();
                                    get_template_part( 'parts/content' );
                                    endwhile;
                                    ?>
                                        <div class="wpdevs-pagination">
                                            <div class="pages new">
                                                <?php previous_posts_link( "<< Newer posts" ); ?>
                                            </div>
                                            <div class="pages old">
                                                <?php next_posts_link( "Older posts >>" ); ?>
                                            </div>
                                        </div>
                                    <?php
                                else: ?>
                                    <h4 class="text-center m-auto align-center">Es gibt noch nichts anzuzeigen!</h4>
                            <?php endif; ?>                                
                        </div>
        
                        <?php /* get_sidebar();  */?>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>