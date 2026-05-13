 <div class="col rounded-0">
  <a href="<?php the_permalink(); ?>"> 
<div class="card card-product rounded-0">
<?php if( has_post_thumbnail()): ?>
  <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
  <?php else: ?>
    <img src="<?php echo get_theme_file_uri('images/no-image.jpg') ?>" class="card-img-top"  alt="<?php the_title(); ?>">
  <?php endif; ?>
  <div class="card-body">
    <p class="card-text text-md-center"><?php the_title(); ?></p>
  </div>
</div>
</a> 
</div>