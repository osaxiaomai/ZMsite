<?php get_header(); ?>
<div class="container">
    <header class="archive-header">
        <h1 class="archive-title"><?php the_archive_title(); ?></h1>
    </header>
    <div class="archive-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>
