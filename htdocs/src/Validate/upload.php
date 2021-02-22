<?php

function uploadImage() {
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $fileName = $_FILES['userfile']['name'];
    $fileTmpName = $_FILES['userfile']['tmp_name'];
    $fileError = $_FILES['error'];
    $fileType = $_FILES['userfile']['type'];
    $fileExt = explode('.', $fileName);
    $fielRealExt = strtolower(end($fileExt));
    $allowed = array("jpeg", "jpg", "png");
    echo $fileExt;
    if (!in_array($fielRealExt, $allowed)) {
        $error = "That image format is not supported, please upload an image with the jpeg, jpg or png file format";
        header('Location: ../../frontend/Validate/new/auctionForm.php?error= ' . urlencode($error));
        exit();
    } else {
        if ($fileError == 0) {
            $fileNameNew = basename($fileName);
            $fileDest = $uploaddir . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDest);
            return $fileDest;
        }
    }
}

uploadImage();
?> 