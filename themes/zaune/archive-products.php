<?php get_header(); ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                    <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                    <div class="container">
                        <div class="archive-items pt-1">
                            <div class="row row-cols-2 row-cols-md-4 g-2">
                            <?php 
                                if( have_posts() ):
                                    while( have_posts() ) : the_post(); ?>
                                  <?php get_template_part( 'parts/content', 'archive-product' ); ?>
                                  <?php      
                                endwhile;
                                ?>
                                </div>
                           
                                    <?php
                                else: ?>
                                    <p>Es gibt noch nichts anzuzeigen!</p>
                            <?php endif; ?>                                
                        </div>
                        <?php /* get_sidebar(); */ ?>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>