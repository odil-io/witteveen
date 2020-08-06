<?php

// Set variables
$background; $flag;

$lead = get_field('lead');

if( has_post_thumbnail() ):
    $background = 'style="background-image:url('.get_the_post_thumbnail_url( get_the_ID(), 'jumbotron').');"';
    $flag = 'text-light bg-semi-dark';
endif;
?>

<section>
    <div class="jumbotron jumbotron-fluid" <?php @print($background); ?>>
        <div class="container py-2 <?php @print($flag); ?>">
            <h1 class="display-4"><?php the_title(); ?></h1>
            <?php if( $lead ): ?>
                <p class="lead"><?php echo $lead; ?></p>
            <?php endif;?>
        </div>
    </div>
</section>
