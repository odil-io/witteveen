<?php get_header(); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2">
                <svg width="6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg>
                <a href="<?= bloginfo('url'); ?>">naar overzicht</a>
            </div>
            <div class="col-12 col-md-10">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 offset-md-2">
                <?php comments_template('/template-parts/post/comments.php', true); ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
