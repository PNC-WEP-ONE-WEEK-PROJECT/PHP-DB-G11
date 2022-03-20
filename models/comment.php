<?php 

require_once("database.php");

// CREATE COMMENT
function createComment($content, $postID,$userID)
    {
        global $db;
        $statement = $db->prepare("INSERT INTO comments(user_ID, post_ID, commentDate, content) values ( :userID,:postID, now(), :content );");
        $statement->execute([
            ':content' => $content,
            ":postID" => $postID,
            ":userID" => $userID
        ]);
        return $statement;
    }

// POST COMMENT
function postComment($postID)
    {
        global $db;
        $statement = $db->prepare("SELECT * FROM comments");
        $statement -> execute();
        $items = $statement -> fetchAll();
        return $items;
    }

// DELETE COMMENTS
function deleteComment($item_delete)
    {
        global $db;
        $statement = $db->prepare('DELETE  FROM comments where comment_ID = :item_delete;');
        $statement->execute([
            ':item_delete' => $item_delete
        ]);
        return $statement->rowCount() == 1;
    }

















?>