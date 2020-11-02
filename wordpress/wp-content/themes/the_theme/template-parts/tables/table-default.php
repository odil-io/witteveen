<?php

$i = 0;
$table = get_field('track_entries');
?>


<?php if( $table ): ?>
    <?php foreach( $table as $track ):?>
        <div id="<?php echo $track['track']; ?>" class="row my-5">
            <div class="col-12 col-md-3">
                <h2>
                    <?php echo $track['track']; ?>
                    <img src="<?php echo get_stylesheet_directory_uri(). '/assets/vectors/'. $track['layout'].'.svg'; ?>" height="200" width="200"/>
                </h2>
            </div>
            <div class="col-12 col-md-9">
                <?php if( $track['table'] ): ?>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Time</th>
                            <th>Bike</th>
                            <th>Rider</th>
                            <th>Condition</th>
                        </tr>
                    <?php foreach( $track['table'] as $entry ): $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $entry['time']; ?></td>
                            <td><?php echo $entry['rider']; ?></td>
                            <td><?php echo $entry['bike']; ?></td>
                            <td>
                                <?php
                                foreach( $entry['condition'] as $value ):
                                    echo $value;
                                endforeach;
                                ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
