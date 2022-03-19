<?php
    require_once("../models/comment.php");
    $comment_ID = $_GET['comment_ID'];
    $userID = $_GET['userID'];
    deleteComment($comment_ID);
    // header("location: ../views/home_view.php?userID=$userID");

?>