<?php
$csvFilePath = '../file.csv';

if (file_exists($csvFilePath)) {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . basename($csvFilePath) . '"');

    $file = fopen($csvFilePath, 'r');

    fpassthru($file);

    fclose($file);
    exit;
} else {
    echo "The file was not found.";
}
