<?php use Roots\Sage\Wrapper; ?>
<?php use Roots\Sage\Assets; ?>

<!doctype html>
<html <?php language_attributes(); ?>>

<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>

  <!--[if IE]>
  <div class="alert alert-warning">
  <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->

<?php do_action('get_header'); ?>

<?php get_template_part('templates/header'); ?>

<main role="document">
  <div class="container">
    <div class="row">
      <?php include Wrapper\template_path(); ?>
    </div>
  </div>
</main>


<?php do_action('get_footer'); ?>

<?php wp_footer(); ?>

</body>
</html>
