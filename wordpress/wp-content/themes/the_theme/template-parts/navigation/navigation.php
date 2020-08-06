<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary_navigation-bar" aria-controls="primary_navigation-bar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'o_w' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo get_site_url(); ?>">Witteveen</a>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary_navigation',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'primary_navigation-bar',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </div>
</nav>
