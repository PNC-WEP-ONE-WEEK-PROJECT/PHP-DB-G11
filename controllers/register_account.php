<?php

    require_once('../models/post.php');

    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $cfpassword = $_POST["cfpassword"];
    if ($password === $cfpassword) {
        $password = $cfpassword;
    }

    registerAccount($email, $firstName, $lastName, $password, $gender);
    $userID = getUserByEmailAndPass($email, $password)["user_ID"];

    header("location: ../pages/home.php?userID=$userID");

?>