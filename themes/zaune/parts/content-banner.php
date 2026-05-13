<div class="main-banner">
    <div class="owl-carousel owl-banner">
    <?php for ($i = 1; $i < 4; $i++) : ?>
<?php 
    $video_url = get_theme_mod("slide_video_$i");
/* 
 $image = get_theme_mod("slide_image_$i");
    $video_url = get_theme_mod("slide_video_$i");

    if ($image) {
        echo '<img src="' . esc_url($image) . '" alt="Slide Image ' . $i . '">';
    }

    if ($video_url) {
        echo '<video controls>
                <source src="' . esc_url($video_url) . '" type="video/mp4">
                Your browser does not support the video tag.
              </video>';
    }
    */

?>
      <div class="item <?php if ($i == 1) echo 'active'; ?>" style="background-image: url('<?php echo get_theme_mod('slide_image_' . $i) ?>');">
        <div class="header-text">
        <?php
          $string = get_theme_mod('slide_subtitle_' . $i);
          $words = explode(' ', $string);
          $formattedSubtitl = '<em>' . $words[0] . '</em> ' . implode(' ', array_slice($words, 1));
          ?>
          <a href="<?php echo $video_url; ?>" class="category btn btn-danger" target="_blank"><?php echo $formattedSubtitl; ?></a>
          <h2><?php echo get_theme_mod('slide_title_'. $i); ?></h2>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>