<?php  

require_once('../models/post.php');

    // UPDATE A POST
    $postId = $_POST["postId"];
    $description = $_POST['description'];
    updatePost($postId, $description);
    $userID = $_GET["userID"];

    header("location: ../pages/home.php?userID=$userID");
    
?>