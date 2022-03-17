<?php
    require_once("../templates/header.php");
?>

<?php
    // GET POST
    require_once("../models/post.php");
    $postId = $_GET["postId"];
    $post = getPostById($postId);
?>

    <!-- EDIT POST INTERFACE -->
    <div class="w-100 pb-3">
        <div class="card border-0 mt-2">
            <form action="../controllers/edit_post.php" method="post">
                <input type="hidden" value=<?php echo $post["post_ID"]; ?> name="postId">
                <div class="w-100">
                    <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto" placeholder="Your Caption Here" rows="auto"><?php echo $post["description"]; ?></textarea>
                </div>
                <div class="w-100 add-photo d-flex justify-content-center align-items-center bg-secondary">
                    <span class="img-text h-100 w-100">
                    </span>
                </div>
                <div class="w-50 me-0 m-auto d-flex mt-3">
                    <button class="w-100 save btn-secondary me-2"><a href="../index.php">Cancel</a></button>
                    <button type="submit" class="w-100  save btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

<?php
require_once("../templates/footer.php");
?>