<?php
if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $filename = "messages/" . time() . ".txt";
    $file = fopen($filename, "w");
    fwrite($file, "Name: $name\n");
    fwrite($file, "Email: $email\n");
    fwrite($file, "Message: $message\n");

    if ($_FILES["file"]["name"]) {
        $file_name = $_FILES["file"]["name"];
        $temp_name = $_FILES["file"]["tmp_name"];
        $imgtype = $_FILES["file"]["type"];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $target_path = "uploads/" . time() . "_" . "$file_name" . ".$ext";

        if (move_uploaded_file($temp_name, $target_path)) {
            fwrite($file, "File: $target_path\n");
        } else {
            fwrite($file, "File: Error uploading file\n");
        }
    }

    fclose($file);

    echo "Message sent successfully";
} else {
    echo "Only POST Method";
}
