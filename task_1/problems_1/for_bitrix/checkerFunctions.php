<?php
function checkPostFields(): bool
{
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message']) || !isset($_POST['file'])) {
        return false;
    }
    return true;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function folderExists($folderPath): bool
{

    if (file_exists($folderPath)) {
        return true;
    }

    if (!mkdir($folderPath)) {
        return false;
    }

    return true;
}
