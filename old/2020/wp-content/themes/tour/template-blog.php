<?php
/**
* Template Name: Blog
*/
?>
<?php $args = array( 'post_type' => 'post' ); ?>

<?php $query = new wp_query( $args ); ?>

<?php if($query->have_posts()): ?>

  <?php while( $query->have_posts() ) : ?>

    <?php $query->the_post(); ?>

    <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php wp_reset_query(); ?>

<?php endif; ?>
