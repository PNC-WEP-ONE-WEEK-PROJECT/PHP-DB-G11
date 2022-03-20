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
        <div class="card border-0 mt-2">
            <form action="<?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require_once("../controllers/edit_post_controller.php");
                };
            ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" value=<?php echo $post["post_ID"]; ?> name="postId">
                <div class="w-100">
                    <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto" placeholder="Your Caption Here" rows="auto"><?php echo $post["description"]; ?></textarea>
                </div>
                <div class="w-100 add-photo bg-secondary">
                    <span class="">
                        <input class=" upload-img" type="file" id="image" name="image" value="<?php echo $post['image']; ?>">
                    </span>
                    <img class="w-100"  src="../images/<?php echo $post['image'] ?>" alt="" >
                </div>
                <div class="w-50 me-0 m-auto d-flex mt-3">
                    <button class="btn-cancel-edit btn me-2" type="cancel"><a class="btn-secondary text-light" href="home_view.php">Cancel</a></button>
                    <button type="submit" class="w-100 p-2  save btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

<?php
require_once("../templates/footer.php");
?>