<?php
    require_once('../models/post.php');
    if (isset($_POST["email"]) and isset($_POST["firstName"]) and isset($_POST["lastName"]) and isset($_POST["gender"]) and isset($_POST["password"]) and isset($_POST["cfpassword"])) {
        $email = $_POST["email"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $gender = $_POST["gender"];
        $password = $_POST["password"];
        $cfpassword = $_POST["cfpassword"];
        if (!empty($email) and !empty($firstName) and !empty($lastName) and !empty($gender) and !empty($password) and !empty($cfpassword)) {
            if ($password === $cfpassword) {
                registerAccount($email, $firstName, $lastName, $password, $gender);
                $userID = getUserByEmailAndPass($email, $password)["user_ID"];
                if (!empty($userID)) {
                    $_SESSION["userID"] = $userID;
                    header("location: ../views/home_view.php");
                }
            } else {
                echo "Retry password!";
            }
        } else {
            echo "Please fill all data require!";
        }
    } else {
        echo "Please fill all data require!";
    }
?>