<?php
    require_once("../models/comment.php");
    $postID = 170;
    $comments = postComment($postID);
    // header("location: ../controllers/post_comment_contrller.php");
?>