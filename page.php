<?php get_header(); ?>

<div class="feng-blog-container">
    <div class="feng-container">
        <article>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </article>
    </div>
</div>

<?php get_footer(); ?>