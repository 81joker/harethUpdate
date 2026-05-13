<article class="latest-news-card col pb-3 h-50">
<div class="card text-white text-end rounded-0">
  <?php if( has_post_thumbnail()): ?>
  <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img img-fluid  rounded-0" alt="<?php the_title(); ?>">
  <?php else: ?>
    <img src="<?php echo get_theme_file_uri('images/no-image-product.jpg') ?>" class="card-img img-fluid rounded-0" alt="<?php the_title(); ?>">
  <?php endif; ?>
  <div class="card-img-overlay overflow-hidden">
    <div class="card-title"><a href="<?php the_permalink(); ?>" class="overflow-hidden"><?php the_title(); ?></a></div>
    <a class="btn btn-danger rounded-0 btn-smm" href="<?php echo get_field('url_link');  ?>"  target="_blank">
      <?php echo ( get_field('title_button'))?: __('Weiterlesen'); ?>
    </a>
  </div>
</div>
</article>