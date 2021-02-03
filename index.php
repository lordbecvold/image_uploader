<?php 
	if (isset($_POST["submit"])) { 

		$result = uniqid(); 

		$uploaddir = '/opt/lampp/htdocs/image_uploader/images/'; 

		$uploadfile = $uploaddir . basename($result.$_FILES['userfile']['name']); 

		$fileName = $result.$_FILES['userfile']['name']; 

		$imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION)); 

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "<h3>Your file must be image</h3>"; 
		} else { 
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

				$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';

				$actual_link = $protocol.$_SERVER['HTTP_HOST'];

				$link = "$actual_link/image_uploader/imageBrowser.php?image=$fileName";

				echo "<h3>Image uploaded on: <a target='_blank'href=$link >$link</a></h3>";
			} else { 
				echo "<h3>Image upload filed :(</h3>";
			}
		}
	}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include"_inc/head.php"; ?>
		
</head>
<body>
	<h2>Image uploader</h2>
	<main>
		<form action="" method="post" enctype="multipart/form-data">
			<h2 class="pageTitle">Add image</h2>
		    <input name="userfile" type="file"/><br>
		    <input type="submit" name="submit" value="Nahrát soubor"/>			
		</form>
	</main>

</body>
</html>