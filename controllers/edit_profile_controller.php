<?php session_start();

require_once('../models/post.php');
    // UPDATE PROFILE
    $userID = $_SESSION["userID"];
    $email = $_POST['email'];
    $firstName = $_POST["firstName"];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $phone = $_POST['phone'];
    $gender = $_POST["gender"];

    updateProfileByUserID($userID, $firstName, $lastName, $gender, $dateOfBirth, $phone, $email);

    header("location: ../views/profile_view.php");

?>