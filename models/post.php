<?php
require_once('database.php');

    // UPLOAD IMAGES
    function uploadImage($photo)
    {
        $img_name = $photo['name'];
        $tmp_name = $photo['tmp_name'];
        $error = $photo['error'];
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //GET EXTENSION
            $img_ex_lc = strtolower($img_ex); //CONVERT TO LOWERCASE
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../images/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                return $new_img_name;
            }else{
                return false;
            }
        }
    }
    // INSERT INTO DATABASE
    function createPost($description, $photo,$userID)
    {
        global $db;
        $statement = $db->prepare("INSERT INTO posts(postDate, description, image,  user_ID) values (now(), :description, :image , :userID);");
        $statement->execute([
            ':description' => $description,
            ':image' => uploadImage($photo),
            ":userID" => $userID
        ]);
        return $statement;
    }


    // DELETE POST
    function deleteItem($item_delete)
    {
        global $db;
        $statement = $db->prepare('DELETE  FROM posts where post_ID = :item_delete;');
        $statement->execute([
            ':item_delete' => $item_delete
        ]);
        return $statement->rowCount() == 1;
    }

    // GET ID FROM DATABASE
    function getItems()
    {
        global $db;
        $statement = $db->query('SELECT * FROM posts');
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
        $statement = $db->prepare("SELECT * FROM allPostsInfo WHERE allPostsInfo.post_ID=:postId;");
        $statement->execute([
            ':postId' => $postId
        ]);
        $post = $statement->fetch();
        return $post;
    }



    // UPDATE A POST
    function updatePost($postId, $description)
    {
        global $db;
        $statement = $db->prepare("UPDATE posts set description=:description, postDate=now() WHERE post_ID=:postId;");
        $statement->execute([
            ':description' => $description,
            ':postId' => $postId
        ]);
        return $statement->rowCount() == 1;
    }


    // REGISTER ACCOUNT, ADD DATA TO DB
    function registerAccount($email, $firstName, $lastName, $password, $gender) 
    {
        global $db;
        $statement = $db->query("insert into users(email, firstName, lastName, userPassword, gender)values('$email', '$firstName', '$lastName', '$password', '$gender');");
        return $statement;
    }

    // GET USER INORMATION
    function getUserByEmailAndPass($email, $password)
    {
        global $db;
        $statement = $db -> prepare("select * from users where email=:email and userPassword=:password");
        $statement -> execute([
            ':email' => $email,
            ':password' => $password
        ]);
        $user = $statement->fetch();
        return $user;
    }
?>
