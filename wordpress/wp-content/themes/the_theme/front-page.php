<?php get_header(); ?>

<?php if( have_posts() ): ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Odilio Witteveen</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                <h5>Blog Posts</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php while( have_posts() ): ?>
                        <?php the_post(); ?>

                        <?php get_template_part('template-parts/index/post', 'default'); ?>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
