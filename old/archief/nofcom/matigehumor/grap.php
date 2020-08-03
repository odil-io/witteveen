<?php
require_once 'class.main.php';

$main = new main();

$currentIndex = $_GET["id"];

$nextIndex = $currentIndex + 1;
$previousIndex = $currentIndex - 1;

$maxIndex = $main->telGrappen();
$minIndex = 1;

if( $currentIndex < $maxIndex){
	$showNext = true;
}
if( $currentIndex > 1){
	$showPrev = true;
}
$item = $main->grapLaden($currentIndex);
$grap = $item["Grap"];

if($_GET["score"] == "up"){
	$main->hahaha($previousIndex);
}
if($_GET["score"] == "down"){
	$main->matig($previousIndex);
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>MatigeHumor.nl - HAHAHA LACHE MAN</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<div class="logo">
					<a href="index.php"><img alt="MatigeHumor.nl" src="img/logo.png" height="100"/></a>
				</div>
				<a class="insturen" href="insturen.php"><img alt="Stuur een grap" src="img/insturen.png"></a>
			</div>
			<div class="grappen">
				<?php if($showPrev){ ?>
					<a class="vorige" href="grap.php?id=<?php echo $previousIndex;?>"></a>
				<?php }?>
				<div class="grap">
					<?php echo $grap;?>
				</div>
				<?php if($showNext){ ?>
					<a class="volgende" href="grap.php?id=<?php echo $nextIndex;?>"></a>
				<?php }?>
			</div>
			<div class="beoordeling">
				<a class="hahaha" href="grap.php?id=<?php if($showNext){ echo $nextIndex; }else { echo $previousIndex; }?>&score=up">HAHAHA.</a>
				<a class="matig" href="grap.php?id=<?php echo $nextIndex;?>&score=down">matig...</a>
			</div>
		</div>
	</body>
</html>