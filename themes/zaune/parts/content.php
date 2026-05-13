<article class="mt-3">
<h2 class="fs-1 fw-bold"><a href="<?php the_permalink(); ?>" class="fw-bold lh-base mb-2 text-capitalize"  style="color: #7C7C7C"><?php the_title(); ?></a></h2>
    <?php if( has_post_thumbnail()): ?>

        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(275, 275), array( 'class' => 'w-25 float-start me-3 mb-2' ) ); ?></a>

    <?php else: ?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_theme_file_uri('images/noImage.png') ?>" alt="" class="w-25 float-start me-3 mb-2"></a>
    <?php endif; ?>
<div class="body">
<div class="meta-info">
        <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
        <?php if( has_category()): ?>
            <p>Categories: <?php the_category( ' ' ); ?></p>
        <?php endif; ?>
        <?php if( has_tag()): ?>
            <p>Tags: <?php the_tags( '', ', '); ?></p>
        <?php endif; ?>
    </div>
    <div class="content mt-2">
    <?php the_excerpt(); ?>
    </div>
</div>
</article>