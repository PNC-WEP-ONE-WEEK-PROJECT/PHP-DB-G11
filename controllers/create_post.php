<?php
    require_once('../models/post.php');

    // Add post
    $description = $_POST['description'];
    createPost($description);
    header('location: ../views/create_post_view.php');
?>