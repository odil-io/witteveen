<?php

if( $_POST ):
  if( isset($_POST['foldername']) ):

    $foldername = $_POST['foldername'];

    if( !is_dir($foldername) ):
      mkdir($foldername);
      echo "200";
    else:
      echo "error";
    endif;
  endif;
endif;

?>
