<?php

define("GOOGLE_MAPS" , "AIzaSyBQXRUnYIwBDxPrYyPsjImyQUnvJnGpiO4");

$files = [
  'vendor/autoload.php',
  'lib/assets.php',
  'lib/extras.php',
  'lib/setup.php',
  'lib/titles.php',
  'lib/wrapper.php',
  'lib/customizer.php'
];

foreach ($files as $file):

  if (!$filepath = locate_template($file)):

    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);

  endif;

  require_once $filepath;

endforeach;

unset($file, $filepath);
