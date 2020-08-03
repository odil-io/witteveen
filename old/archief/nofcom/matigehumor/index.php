<?php

require_once 'class.main.php';

$main = new Main();

$opgeteldeGrappen = $main->telGrappen();

$index = rand(1, $opgeteldeGrappen);

header("location: grap.php?id=$index");

?>
