<?php
function checkPostFields() {
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['message']) || !isset($_POST['file'])) {
        return false;
    }
    return true;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
