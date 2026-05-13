<section id="post-<?php the_ID(); ?> " <?php post_class(); ?>>
  <div class="single-property section pt-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="main-image">
            <?php 
           $content = get_the_content();
           $gallery_rendered = false;
           // Parse the content into blocks
            $blocks = parse_blocks($content);
            // Loop through the blocks
            foreach ($blocks as $block) {
             // Check if the block is a 'wp-block-gallery'
             if ($block['blockName'] === 'core/gallery') {
                // Render the gallery block
                echo render_block($block);
                $gallery_rendered = true;
                break;
              }
            } 
            if (!$gallery_rendered) {
                the_post_thumbnail();
            }
           ?>
            </div>
          <div class="main-content">
            <?php
            $product_categories = wp_get_post_terms(get_the_ID(), 'product_category');
            ?>
            <?php if($product_categories):  ?>
            <span class="category"><?php echo $product_categories[0]->slug; ?></span>
            <?php endif; ?>
            <h4><?php the_title(); ?></h4>
            <p><?php the_content();?></p>
          </div>

        </div>
        <!-- <div class="col-lg-4">
          <div class="info-table sticky-md-top align-self-start">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>450 m2<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span>Contract Ready</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Payment Process</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
          </div>
        </div> -->
      </div>
    </div>
</section>