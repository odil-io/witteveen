<article class="col-12 mb-6">
    <div class="row">
        <div class="col-12 col-md-3">
            <header>
                <span class="text-muted">
                    <time class="updated" datetime="<?= get_post_time('c', true); ?>">
                        <?php echo get_the_date(); ?>
                    </time>
                </span>

                <h3>
                    <?php the_title(); ?>
                </h3>

                <?php if( !is_single() and get_comments_number() != '0' ): ?>
                    <div class="text-muted">
                        <a href="<?php echo get_permalink(); ?>">Reacties <span class="badge badge-info"><?php echo get_comments_number(); ?></span></a>
                    </div>
                <?php endif; ?>

            </header>
        </div>

        <div class="col-12 col-md text-justify">
            <div class="row">
                <div class="col-12">
                    <div class="lead">
                        <?php if( has_post_thumbnail() ): ?>
                            <a class="lightbox float-right" href="<?php the_post_thumbnail_url(); ?>">
                                <img class="img-fluid border-1 img-shadow mt-2 ml-3" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>

                        <?php the_excerpt(); ?>

                        <a href="<?php the_permalink(); ?>">Lees meer</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
