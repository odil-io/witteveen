<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>NEWFISH SITE INDEX</title>
		<style>
			body{
				background-color:#3ea3de;
			}
			ul{
				
			}
			li{
				float:left;
				list-style:none;
				margin:10px;
			}
			li img{
				border:8px solid #ffffff;
			}
			li img:hover{
				border-color:#f54609;
			}
		</style>
	</head>
	<body>
		<?php if ($handle = opendir('.')) { ?>
			  <?php  while (false !== ($entry = readdir($handle))) { ?>
			        <?php if ($entry != "." && $entry != ".." && $entry != "index.php") { ?>
						<li><a href="<?= $entry; ?>"><img src="http://placehold.it/200x200&text=<?= $entry ?>"/></a></li>
					<?php } ?>
				<?php } ?>
			<?php closedir($handle); ?>
		<?php } ?>
	</body>
</html>