<?php use Roots\Sage\Assets; ?>

<div class="container mt-6 mb-5">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row align-items-center">
        <div class="col-3 pl-md-6">
          <a href="<?php bloginfo('url'); ?>">
            <img class="img-fluid img-circle" src="<?= the_post_thumbnail_url('thumbnail');?>" alt="Odilio Witteveen">
          </a>
        </div>
        <div class="col-9 text-justify">
          <p class="lead"><?php bloginfo('description'); ?></p>
          <p class="text-muted">
            <? $values = get_field('landen'); ?>
            <? $field = get_field_object('landen'); ?>
            <? $choices = $field['choices']; ?>
            <? $i = 0; ?>
            <? foreach ($choices as $value => $label): $i++ ?>
              <? $class = (in_array($value, $values)) ? 'class="text-success"':''; ?>
              <? if( $i > 1): ?>
              <? endif; ?>
              <span <?= $class; ?>>
                [<?= $label;?>]
              </span>
            <? endforeach; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <? if( is_single() ): ?>
  <div class="row pt-4">
      <div class="col-12 lead text-center">
        <svg width="6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg>
        <a href="<?= bloginfo('url'); ?>">naar overzicht</a>
      </div>
    </div>
  <? endif; ?>
</div>
