<?php

try {
    require_once "checker.php";
} catch (\Throwable $e) {
    echo "This was caught: " . $e->getMessage();
    exit;
}

$folderRecords= "../messages/";
$folderImages = "../uploads/";

if (!folderExists($folderImages)) {
    echo "The folder has not been created";
    exit;
}

if (!folderExists($folderRecords)) {
    echo "The folder has not been created";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = null;
    $email = null;
    $message = null;

    if (checkPostFields()) {
        echo "Not all fields have been submitted";
        exit;
    }

    if (validateEmail($email)) {
        echo "Invalid email format";
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $fileName = $folderRecords . time() . ".txt";
    $file = fopen($fileName, "w");
    fwrite($file, "Name: $name\n");
    fwrite($file, "Email: $email\n");
    fwrite($file, "Message: $message\n");

    if ($_FILES["file"]["name"]) {
        $imageName = $_FILES["file"]["name"];
        $imageTmpName = $_FILES["file"]["tmp_name"];
        $imgType = $_FILES["file"]["type"];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);
        $targetPath = $folderImages . time() . "_" . "$imageName";

        if (move_uploaded_file($imageTmpName, $targetPath)) {
            fwrite($file, "File: $targetPath\n");
        } else {
            fwrite($file, "File: Error uploading file\n");
        }
    }

    fclose($file);

    echo "Message sent successfully";
} else {
    echo "Only POST Method";
}
