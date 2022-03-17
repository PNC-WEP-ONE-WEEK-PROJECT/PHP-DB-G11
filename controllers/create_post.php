<?php
    require_once('../models/post.php');

    // ADD POST

    $description = $_POST['description'];
    $photo = $_FILES['image'];
    if (!empty($description) or !isset($photo)){
        createPost($description, $photo);
        header("location: ../index.php");
    }else{
        $massage = "You must add your description or image";
        header("location: ../views/create_post_view.php?error=$massage");
    }
    
    // header("location: ../index.php");
?>