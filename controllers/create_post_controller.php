<?php
    require_once('../models/post.php');

    // ADD POST
    $description = $_POST['description'];
    $photo = $_FILES['image'];
    $userID = $_GET["userID"];
    if (!empty($description) or ($photo['name'] != null)){
        createPost($description, $photo,$userID);
        header("location: ../views/home_view.php?userID=$userID");
    // print_r($photo);

    }else{
        $massage = "You must add your description or image";
        header("location: ../views/create_post_view.php?userID=$userID&error=$massage");
    }
    
?>