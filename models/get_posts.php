<?php
    require_once('database.php');

    // GET ALL POSTS
    function getPosts()
    {
        global $db;
        $statement = $db->query("SELECT userdetails.user_ID, userdetails.firstName, userdetails.lastName, postdetails.post_ID, postdetails.description, postdetails.postDate, postlikes.numberOfLikes, postcomments.numberOfComments FROM userdetails
                                JOIN postdetails on userdetails.user_ID = postdetails.user_ID
                                JOIN postlikes on postdetails.post_ID = postlikes.post_ID
                                JOIN postcomments on postdetails.post_ID = postcomments.post_ID ORDER BY postdetails.postDate DESC;");
        $posts = $statement->fetchAll();
        // print_r($posts);
        return $posts;
    }
?>