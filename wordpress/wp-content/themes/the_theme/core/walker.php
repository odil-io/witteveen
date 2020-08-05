<?php

class bz_walker extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0) {

      $classes = 'menu__item';
      $classes .= $item->current_item_parent ? ' is--active' : '';
      $classes .= $args->walker->has_children ? ' menu__item--has-submenu' : '';
      $classes .= $item->object_id == get_the_ID() ? ' is--active' : '';
      $target = ! empty( $item->target ) ? $item->target : '';
      $classes .= ' ' . implode(' ', $item->classes);
      // replace #home_url with the home_url so we can add custom links to the menu easier
      $url = str_replace('#home_url', get_home_url(), $item->url);
      $output .= sprintf( "\n<li class='%s'><a class='menu__link' href='%s' target='%s'>%s</a>",
          $classes,
          $url,
          $target,
          $item->title
      );
  }
}
