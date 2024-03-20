<?php
if(isset($_FILES['csvFile'])) {
    $uploadFile = '../file.csv';

    if (move_uploaded_file($_FILES['csvFile']['tmp_name'], $uploadFile)) {
        echo "The file has been uploaded successfully.";
    } else {
        echo "File upload error.";
    }
} else {
    echo "The file was not sent.";
}