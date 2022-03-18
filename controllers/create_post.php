<?php
    require_once('../models/post.php');

    // ADD POST
    $description = $_POST['description'];
    $photo = $_FILES['image'];
    $userID = $_GET["userID"];
    if (!empty($description) or isset($photo)){
        createPost($description, $photo,$userID);
        header("location: ../pages/home.php?userID=$userID");
    }else{
        $massage = "You must add your description or image";
        header("location: ../views/create_post_view.php?userID=$userID&error=$massage");
    }
    
?>