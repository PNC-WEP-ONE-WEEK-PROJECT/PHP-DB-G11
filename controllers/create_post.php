<?php
    require_once('../models/post.php');

    // ADD POST
    $description = $_POST['description'];
    createPost($description);
    header('location: ../index.php');
?>