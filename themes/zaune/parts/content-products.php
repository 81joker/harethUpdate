<?php
$terms = get_terms(array(
  'taxonomy' => 'product_category',
  'hide_empty' => false,
  'parent' => 0, // Get only top-level categories
  'order' => 'DESC',
));

?>
<div class="container border p-4">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-3 d-md-block bg-warning sidebar p-3 sticky-md-top align-self-start">
      <h5 class="fw-bold">Gesamte Auswahl zeigen</h5>
      <ul class="nav flex-column properties-filter">
        <li class="nav-item">
          <a class="is_active nav-link" href="#!" data-filter="*">Komplette Übersicht</a>
        </li>
        <?php
        if (!empty($terms) && !is_wp_error($terms)) {
          foreach ($terms as $term) {
            // Get all child terms of the current parent
            $child_terms = get_terms(array(
              'taxonomy' => 'product_category',
              'hide_empty' => false,
              'parent' => $term->term_id,
            ));

            // Create array of all related slugs
            $filter_slugs = array($term->slug);
            foreach ($child_terms as $child_term) {
              $filter_slugs[] = $child_term->slug;
            }
        ?>
            <li class="nav-item">
              <a href="#!" class="nav-link" 
                 data-filter=".<?php echo esc_attr(implode(',.', $filter_slugs)) ?>">
                <i class="bi bi-signpost-2"></i>
                <?php echo esc_html($term->name) ?>
              </a>
            </li>
        <?php
          }
        } else {
          echo 'No categories found.';
        }
        ?>
      </ul>
    </nav>

    <?php
    // Query Products and Display Categories
    $products = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'products',
      'order' => 'DESC',
    ));
    ?>
    <!-- Main Content -->
    <main class="col-md-9  p-4">
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 properties-box">
        <?php
        if ($products->have_posts()) {
        while ($products->have_posts()) :
          $products->the_post();
          $product_categories = wp_get_post_terms(get_the_ID(), 'product_category');
        ?>
          <div class="col properties-items <?php echo esc_attr($product_categories[0]->slug) ?>">
            <a href="<?php echo esc_url(get_the_permalink()) ?>">
            <div class="card card-product">
            <?php if( has_post_thumbnail()): ?>
              <img src="<?php echo  esc_url(get_the_post_thumbnail_url()) ?>" class="card-img-top" alt="<?php echo esc_html(get_the_title()); ?>">
              <?php else: ?>
                <img src="<?php echo get_theme_file_uri('images/no-image.jpg') ?>" class="card-img-top" alt="<?php echo esc_html(get_the_title()); ?>">
              <?php endif; ?>
              <div class="card-body text-md-center">
                <p class="card-text">
                    <?php
                      $text = esc_html(get_the_title());
                      $max_length = 15; 
                      echo (strlen($text) > $max_length) ? substr($text, 0, $max_length) . '...' : $text;
                      ?>
                </p>
              </div>
            </div>
            </a>
          </div>

        <?php endwhile; ?>
        <?php } else { ?>
          <div class="col">
            <p>No products found.</p>
          </div>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
        <!-- Add more tool items following the same structure -->
      </div>
      <div class="text-center mt-3">
        <a href="<?php echo get_post_type_archive_link('products') ?>" class="btn btn-danger">VIEW MORE</a>
      </div>
    </main>
  </div>
</div>