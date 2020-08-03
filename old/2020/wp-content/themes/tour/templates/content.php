<article class="col-12 mb-6">
  <div class="row">
    <div class="col-12 col-md-3">
      <header>
        <? if( $location = get_field('location') ): ?>
          <a href="https://www.google.com/maps/place/@<?= $location['lat']; ?>,<?= $location['lng']; ?>,400m/data=!3m1!1e3" target="_blank" title="<?= $location['address']; ?>"><svg height="16" aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M312 128c0-13.26-10.75-24-24-24s-24 10.74-24 24c0 13.25 10.75 24 24 24s24-10.74 24-24zm248.02 32c-1.96 0-3.98.37-5.96 1.16L384.01 224H384l-10.27-3.62c23.3-34.86 42.28-71.2 42.28-97.33C416 55.09 358.69 0 288 0S160 55.09 160 123.05c0 11.8 4.02 25.75 10.39 40.64L20.12 215.96C7.97 220.81 0 232.58 0 245.67v250.32C0 505.17 7.53 512 15.99 512c1.96 0 3.97-.37 5.96-1.16L192 448l172 60.71a63.98 63.98 0 0 0 40.05.15l151.83-52.81A31.996 31.996 0 0 0 576 426.34V176.02c0-9.19-7.53-16.02-15.98-16.02zM176 419.8L31.91 473.05l-1.28-226.87L176 195.61V419.8zM288 32c52.94 0 96 40.84 96 91.05 0 27-38.09 88.89-96 156.77-57.9-67.88-96-129.77-96-156.77C192 72.84 235.06 32 288 32zm80 444.19l-160-56.48V228.82c24.42 35.27 52.14 68 67.71 85.66 3.24 3.68 7.77 5.52 12.29 5.52s9.05-1.84 12.29-5.52c12.76-14.47 33.7-39.11 54.28-66.94l13.42 4.74v223.91zm32 .2V252.21l144.09-53.26 1.28 226.87L400 476.39z" class=""></path></svg></a>
        <? endif; ?>

        <span class="text-muted">
          <time class="updated" datetime="<?= get_post_time('c', true); ?>">
            <?= get_the_date(); ?>
          </time>
        </span>

        <h5 class="display-3">
          <?php the_title(); ?>
        </h5>

        <? if( !is_single() and get_comments_number() != '0' ): ?>
          <div class="text-muted">
            <a href="<?= get_permalink(); ?>">Reacties <span class="badge badge-info"><?= get_comments_number(); ?></span></a>
          </div>
        <? endif; ?>

      </header>
    </div>
    <div class="col-12 col-md text-justify">
      <div class="row">
        <div class="col-12">
          <div class="lead">
            <? if( has_post_thumbnail() ): ?>
            <a class="lightbox float-right" href="<? the_post_thumbnail_url(); ?>">
              <img class="img-fluid border-1 img-shadow mt-2 ml-3" src="<? the_post_thumbnail_url('thumbnail'); ?>" alt="<? the_title(); ?>">
            </a>
          <? endif; ?>
            <? the_content(); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <? if( is_single() ): ?>
            <? comments_template('/templates/comments.php'); ?>
          <? endif; ?>
        </div>
      </div>
    </div>
  </div>
</article>
