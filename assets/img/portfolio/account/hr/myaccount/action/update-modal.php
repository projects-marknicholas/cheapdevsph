<?php

include '../../../config.php';

if (isset($_POST['update'])) {
    //gets the information in the file
    $file = $_FILES['pos_signature'] ?? "";
    $filename = $_FILES['pos_signature']['name'] ?? "";
    $fileTmpName = $_FILES['pos_signature']['tmp_name'] ?? "";
    $fileSize = $_FILES['pos_signature']['size'] ?? "";
    $fileError = $_FILES['pos_signature']['error'] ?? "";
    $fileType = $_FILES['pos_signature']['type'] ?? "";

    $fileExt = explode('.', $filename);

    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000000000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "Uploaded Succesfully";

                $issued_place = $_POST['issued_place'];
                $pos_name = $_POST['pos_name'];
                $pos_position = $_POST['pos_position'];

                $sql = "UPDATE certificate_of_employment SET issued_place = '".$issued_place."', pos_signature = '".$fileNameNew."', pos_name = '".$pos_name."', pos_position = '".$pos_position."' ";
                mysqli_query($link, $sql);
                header('Location: ../certificates.php');
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

?>