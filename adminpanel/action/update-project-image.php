<?php
include '../config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: ./');
}

$id = $_POST['id'];
$title = $_POST['title'];

if (isset($_POST['image'])) {

	$file = $_FILES['file'] ?? "";
	$filename = $_FILES['file']['name'] ?? "";
	$fileTmpName = $_FILES['file']['tmp_name'] ?? "";
	$fileSize = $_FILES['file']['size'] ?? "";
	$fileError = $_FILES['file']['error'] ?? "";
	$fileType = $_FILES['file']['type'] ?? "";

	$fileExt = explode('.', $filename);

	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed)) {
	    if ($fileError === 0) {
	        if ($fileSize < 5000000000000000) {
	            $fileNameNew = uniqid('', true).".".$fileActualExt;
	            $fileDestination = '../../uploads/'.$fileNameNew;
	            move_uploaded_file($fileTmpName, $fileDestination);
	            $sql = "UPDATE projects SET image = '".$fileNameNew."' WHERE id = '".$id."' AND project_title = '".$title."'";
				mysqli_query($link, $sql);
				header('location: ../view-project?id='.$id.'&title='.$title.'');
	        }
	        else{
	            echo "Your file is too big";
	        }
	    }
	    else{
	        echo "There was an error uploading your file";
	    }
	}
	else{
	    echo "Cannot upload this file type";
	}
}

else{
	header('location: ../view-project?id='.$id.'&title='.$title.'');
}
?>