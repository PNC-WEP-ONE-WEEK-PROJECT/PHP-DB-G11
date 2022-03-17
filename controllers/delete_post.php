<?php
    require_once('../models/post.php');
    $post_ID = $_GET['post_ID'];
    deleteItem($post_ID);
    $userID = $_GET["userID"];
    
    header("location: ../pages/home.php?userID=$userID");
?>