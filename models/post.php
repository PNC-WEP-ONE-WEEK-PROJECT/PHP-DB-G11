<?php
    require_once('database.php');
   
    // ADD POST
    function createPost($description)
    {
        global $db;
        $statement = $db -> prepare("INSERT INTO posts(postDate, description, user_ID) values (now(), :description, 2);");
        $statement -> execute([
            ':description' => $description
        ]);
        return $statement;
    }
?>
