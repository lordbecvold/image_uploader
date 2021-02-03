<?php  

	$image = $_GET["image"];

?>

<!DOCTYPE html>
<html>
<head>
	<?php include"_inc/head.php"; ?>
</head>
<body>
	<div class="imgBrowserPage">
		<?php  
			echo "<img class='imgBrowser' src=images/$image>";
		?>
	</div>
</body>
</html>

