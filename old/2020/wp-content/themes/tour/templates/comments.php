<section id="comments" class="comments mt-5">

  <?php if (have_comments()) : ?>
    <h2 class="display-4">Reacties</h2>
    <ol class="comment-list p-0">
      <?php wp_list_comments(['style' => 'div', 'short_ping' => true]); ?>
    </ol>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Dit bericht is meer dan 2 weken oud, daarom zijn de reacties gesloten.', 'sage'); ?>
    </div>
  <?php endif; ?>

  <?php comment_form(); ?>

</section>
