<?php
    require_once('database.php');
   
    // Add post
    $description = $_POST['description'];
    
    function createPost($description)
    {
        global $db;
        $statement = $db -> prepare("INSERT INTO posts(postDate, description) values (now(), :description );");
        $statement -> execute([
            ':description' => $description,
    ]);
    return $statement;
}
// if ($description != null ){
    createPost($description);
// }
header('location: add_post.php');
?>
