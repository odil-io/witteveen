
<div class="navigation">
    <div class="navigation__mobile-bar">
        <img class="navigation__mobile-bar__logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/logo.svg" alt="Logo" />
        <button class="button menu-button"></button>
    </div>
    <div class="navigation__menus">
        <nav class="navbar">
            <div class="navbar__container">
                <a href="<?php echo get_home_url(); ?>" class="navbar__branding">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo" />
                </a>
                <div class="navbar__menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary_navigation',
                        'menu_class'     => 'menu',
                        'container'      => 'nav',
                        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                        'walker'        => new bz_walker()
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
