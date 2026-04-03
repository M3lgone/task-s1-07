<?php

session_start();

try {
    if (!isset($_POST["username"])) {
        throw new Exception("Username does not exist");
    }

    $user = trim($_POST["username"]);

    if (empty($user)) {
        throw new Exception("Username cannot be empty");
    }
    if (is_numeric($user)) {
        throw new Exception("Username cannot be only numbers");
    }

    if (!isset($_POST["email"])) {
        throw new Exception("Email does not exist");
    }

    $mail = trim($_POST["email"]);

    if (empty($mail)) {
        throw new Exception("Email cannot be empty");
    }
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("This is not a email");
    }

    $_SESSION["username"] = $user;
    echo "Username: " . $_SESSION["username"] . "<br>";

    $_SESSION["email"] = $mail;
    echo "Email: " .  $_SESSION["email"];

} catch (Exception $e) {
    echo "Caught an exceptcion: " . $e->getMessage();
}
