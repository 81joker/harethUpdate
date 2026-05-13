<?php
/**
 * Template Name: About us
 */
?>
<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<?php
   get_template_part('parts/content', 'page');
?>
<?php
endwhile;
?>
<?php get_footer(); ?>