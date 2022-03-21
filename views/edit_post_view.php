<?php session_start();
    require_once("../templates/header.php");
?>

<?php
    // GET POST
    require_once("../models/post.php");
    $postId = $_GET["postId"];
    $post = getPostById($postId);
?>
    <!-- EDIT POST INTERFACE -->
    <div class="w-100 p-2 pb-3">
        <form action="<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once("../controllers/edit_post_controller.php");
            };
        ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value=<?php echo $post["post_ID"]; ?> name="postId">
            <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto" placeholder="Your Caption Here" rows="auto"><?php echo $post["description"]; ?></textarea>
            <label for="image" class="cursor bg-primary text-light py-1 px-3 mb-2">Upload image</label>
            <input class="upload-img" type="file" id="image" name="image" value="<?php echo $post['image']; ?>" hidden >
            <img class="w-100"  src="../images/<?php echo $post['image'] ?>" alt="" >
            <div class="w-50 me-0 m-auto d-flex">
                <button class="btn-cancel-edit btn me-2" type="cancel"><a class="btn-secondary text-light" href="home_view.php">Cancel</a></button>
                <button type="submit" class="w-100 p-2 btn-primary">Save</button>
            </div>
        </form>
    </div>

<?php
require_once("../templates/footer.php");
?>