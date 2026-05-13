<?php
$args = array(
  'taxonomy'   => 'product_cat',
  'hide_empty' => false,
);

$categories = get_terms($args);

if (!empty($categories) && !is_wp_error($categories)) {
  echo '<ul class="product-categories">';
  foreach ($categories as $category) {
      echo '<li><a href="#!" class="category-link" data-category-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
  }
  echo '</ul>';
} else {
  echo '<p>No categories found.</p>';
}

?>
<div class="products-display-area">
    <!-- Products will be loaded here -->
</div>
<script>
    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryId = this.getAttribute('data-category-id');

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=get_products_by_category&category_id=' + categoryId
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.products-display-area').innerHTML = data.data;
                } else {
                    document.querySelector('.products-display-area').innerHTML = '<p>' + data.data + '</p>';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>