<?php
/**
 * Template Name: Home Template
 */
get_header(); ?>

<div class="page-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
