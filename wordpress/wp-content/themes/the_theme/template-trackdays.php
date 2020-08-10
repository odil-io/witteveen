<?php
/**
* Template Name: Track Days
*/
?>

<?php get_header(); ?>

<?php if( have_posts() ): ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <?php while( have_posts() ): ?>

                        <?php the_post(); ?>

                        <?php get_template_part('template-parts/tables/table', 'default'); ?>

                    <?php endwhile; ?>
                </div>
                <div class="col-12 col-md-3">
                    <div class="position-sticky">
                        STICKY
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
