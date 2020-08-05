<?php get_header(); ?>

<?php if( have_posts() ): ?>

    <?php get_template_part('template-parts/jumbotron/jumbotron'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php while( have_posts() ): ?>
                        <?php the_post(); ?>

                        <?php the_title(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
