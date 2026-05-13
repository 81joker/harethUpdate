<?php
$terms = get_terms(array(
  'taxonomy' => 'product_category', // Taxonomy name
  'hide_empty' => false, // Include empty terms
));
?>
<form role="search" method="get" id="searchform" class="searchform d-flex mx-auto search-bar" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <button class="btn dropdown-toggle btn-danger rounded-0" type="button" data-bs-toggle="dropdown">All Categories</button>
        <ul class="dropdown-menu">
            <?php
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    ?>
                    <li class="d-block">
                        <a class="dropdown-item" href="#" data-term-id="<?php echo esc_attr($term->term_id); ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    </li>
                    <?php
                }
            } else {
                echo 'No categories found.'; // Fallback message
            }
            ?>
        </ul>
        <input type="hidden" name="product_category" id="selected-category" value="">
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control form-control-lg border">
        <button type="submit" id="searchsubmit" class="btn btn-danger px-3 rounded-0 px-5">
            <i class="bi bi-search"></i>
        </button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var dropdownItems = document.querySelectorAll('.dropdown-item');
    var selectedCategoryInput = document.getElementById('selected-category');

    dropdownItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            var termId = this.getAttribute('data-term-id');
            selectedCategoryInput.value = termId;
            this.closest('.dropdown-menu').previousElementSibling.textContent = this.textContent;
        });
    });
});
</script>