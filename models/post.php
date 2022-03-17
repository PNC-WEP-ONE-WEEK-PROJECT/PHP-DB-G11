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

    // DELETE POST
    function deleteItem($item_delete)
    {
        global $db;
        $statement = $db -> prepare('DELETE  FROM posts where post_ID = :item_delete;');
        $statement -> execute([
            ':item_delete' => $item_delete
            ]);
        return $statement ->rowCount() ==1;
    
    }   

    // GET ID FROM DATABASE
    function getItems()
    {
        global $db;
        $statement = $db -> query('SELECT * FROM posts');
        $items = $statement->fetchAll();
        return $items;
    }

    // GET ALL POSTS
    function getPosts()
    {
        global $db;
        $statement = $db->query("SELECT * FROM allpostsinfo");
        $posts = $statement->fetchAll();
        // print_r($posts);
        return $posts;
    }

    // GET A POST BY ID
    function getPostById($postId) 
    {
        global $db;
        $statement = $db -> prepare("SELECT * FROM allPostsInfo WHERE allPostsInfo.post_ID=:postId;");
        $statement -> execute([
            ':postId' => $postId
        ]);
        $post = $statement->fetch();
        return $post;
    }

    // UPDATE A POST
    function updatePost($postId, $description) 
    {
        global $db;
        $statement = $db -> prepare("UPDATE posts set description=:description, postDate=now() WHERE post_ID=:postId;");
        $statement -> execute([
            ':description' => $description,
            ':postId' => $postId
        ]);
        return $statement->rowCount() == 1;
    }

?>
