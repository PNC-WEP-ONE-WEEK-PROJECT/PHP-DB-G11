<?php
    require_once('../models/post.php');

    // Add post
    $description = $_POST['description'];
    createPost($description);
    header('location: ../index.php');
?>