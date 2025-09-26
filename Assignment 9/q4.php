<?php
class PasswordException extends Exception {}

function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long.");
    }
    if (!preg_match("/[A-Z]/", $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter.");
    }
    if (!preg_match("/[0-9]/", $password)) {
        throw new PasswordException("Password must contain at least one digit.");
    }
    if (!preg_match("/[@#$%]/", $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %).");
    }
    return true;
}

$passwords = ["abc123", "SecurePass1", "MyPass@2025", "weakpass"];

foreach ($passwords as $pwd) {
    try {
        validatePassword($pwd);
        echo " '$pwd' is a valid password.<br>";
    } catch (PasswordException $e) {
        echo " '$pwd' - " . $e->getMessage() . "<br>";
    }
}
?>

