<?php
$terms = get_terms(array(
    'taxonomy' => 'product_category', // Taxonomy name
    'hide_empty' => false, // Include empty terms
));

?>
  <div class="section properties">
    <div class="container">
      <ul class="properties-filter">
      <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <?php

if (!empty($terms) && !is_wp_error($terms)) {
    echo '<ul>';
    foreach ($terms as $term) { 
        ?>
        <li>
          <a href="#!" data-filter=".<?php echo esc_attr($term->slug) ?>" ><?php echo esc_html($term->name) ?></a>
          <!-- <a href="<?php /* echo  esc_url(get_term_link($term)) */?>" " > XX</a> -->
        </li>
    <?php
    }
    echo '</ul>';
} else {
    echo 'No categories found.'; // Fallback message
}

?>

</ul>

<!-- Start Products -->
<?php 
// Query Products and Display Categories
$products = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'products',
    'order' => 'DESC',
));
?>
<!-- End Products -->


      <div class="row properties-box">
        <?php
        while($products->have_posts()) :
            $products->the_post();
            
            // Retrieve categories related to the current product
            $product_categories = wp_get_post_terms(get_the_ID(), 'product_category');
        
        ?>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 <?php echo esc_attr($product_categories[0]->slug) ?>">
          <div class="">
            <a href="<?php echo  esc_url(get_the_permalink())?>"><img src="<?php echo  esc_url(get_the_post_thumbnail_url())?>" alt=""></a>
            <span class="category"><?php echo esc_attr($product_categories[0]->slug) ?></span>
            <h6>$2.264.000</h6>
            <h4><a href="<?php echo  esc_url(get_the_permalink())?>"><?php echo  esc_html(get_the_title())?></a></h4>
            <p><?php echo  esc_html(get_the_excerpt())?></p>
            <div class="main-button">
              <a href="<?php echo  esc_url(get_the_permalink())?>">Schedule a visit</a>
            </div>
          </div>
        </div>


        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>


    </div>
  </div>