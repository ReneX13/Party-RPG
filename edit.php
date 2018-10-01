<?php

	if($_FILES){
		if(move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$_FILES["file"]["name"])){
			echo "worked";	
		}else{
			echo "not worked";
		}
	}else{
		echo "no files";
		header("Location: index.php");
	}
?>
