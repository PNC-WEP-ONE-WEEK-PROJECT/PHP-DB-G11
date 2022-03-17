<?php
    require_once('../models/post.php');

    // ADD POST
    $description = $_POST['description'];
    $userID = $_GET["userID"];
    createPost($description, $userID);
    $userID = $_GET["userID"];

    header("location: ../pages/home.php?userID=$userID");
?>