<?php
    require_once('database.php');
   
    // Add post
    function createPost($description)
    {
        global $db;
        $statement = $db -> prepare("INSERT INTO posts(postDate, description, user_ID) values (now(), :description, 1);");
        $statement -> execute([
            ':description' => $description
        ]);
        return $statement;
    }
?>
