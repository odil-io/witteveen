<?php get_header(); ?>

<?php if( have_posts() ): ?>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <?php while( have_posts() ): the_post(); ?>

                        <?php get_template_part('template-parts/post/post', get_post_type() != 'post' ? get_post_type() : 'default'); ?>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
  <div class="alert alert-warning">
    <?php _e('Geen berichten gevonden.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php get_footer(); ?>
