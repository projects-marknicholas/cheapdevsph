<?php

include '../../../config.php';

if (isset($_POST['update_certificate'])) {

	if (isset($_POST['coe_signature'])) {
		$file = $_FILES['coe_signature'] ?? "";
	    $filename = $_FILES['coe_signature']['name'] ?? "";
	    $fileTmpName = $_FILES['coe_signature']['tmp_name'] ?? "";
	    $fileSize = $_FILES['coe_signature']['size'] ?? "";
	    $fileError = $_FILES['coe_signature']['error'] ?? "";
	    $fileType = $_FILES['coe_signature']['type'] ?? "";

	    $fileExt = explode('.', $filename);

	    $fileActualExt = strtolower(end($fileExt));

	    $allowed = array('jpg', 'jpeg', 'png');

	    if (in_array($fileActualExt, $allowed)) {
	        if ($fileError === 0) {
	            if ($fileSize < 5000000000000000) {
	                $fileNameNew = uniqid('', true).".".$fileActualExt;
	                $fileDestination = 'uploads/'.$fileNameNew;
	                move_uploaded_file($fileTmpName, $fileDestination);

					$coe_signature = $_POST['coe_signature'];

	                $coe_signature_sql = "UPDATE certficate SET coe_signature = '".$coe_signature."' WHERE viewid = ".$_GET['id']." ";
	                mysqli_query($link, $coe_signature_sql);
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
}
else{
	echo "ERROR contact the developer";
}

?>