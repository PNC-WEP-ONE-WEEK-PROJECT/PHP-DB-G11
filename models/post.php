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
        $statement = $db -> prepare('DELETE  FROM facebook where id = :item_delete;');
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

?>
