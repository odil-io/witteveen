<?php

$input = '';

if( $_SERVER['REQUEST_METHOD'] === 'POST' ):
  $input = ( isset($_POST['entry']) ) ? $_POST['entry'] : null;
endif;

//Encode the array into a JSON string.
// $encodedString = json_encode($array);

//Save the JSON string to a text file.
// file_put_contents('json_array.txt', $encodedString);

//Retrieve the data from our text file.
$fileContents = file_get_contents('json_array.txt');

//Convert the JSON string back into an array.
$json = json_decode($fileContents, true);
?>
