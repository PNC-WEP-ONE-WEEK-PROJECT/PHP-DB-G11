<?php
    require_once("../templates/header.php");
?>
<div class="w-100 p-1">
    <div class="card border-0 mt-2">
        <span class="text-danger">
            <?php 
            // CHECK WHEN USERS DO NOT INPUT DESCRIPTION OR IMAGE
                if (isset($_GET['error'])){
                    echo $_GET['error'];
                }
            ?>
        </span>
        <form action="../controllers/create_post.php?userID=<?php echo $_GET["userID"]; ?>" method="post"
            enctype="multipart/form-data">

            <div class="w-100">
                <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto"
                    placeholder="Your Caption Here" rows="auto"></textarea>
            </div>
            <div class="w-100 add-photo d-flex justify-content-center align-items-center bg-secondary">

                <span class="img-text h-100 w-100 d-flex justify-content-center align-items-center">
                    <input class="h-50 w-100  upload-img ps-5" type="file" id="image" name="image">
                </span>
            </div>
            <div class="w-50 me-0 m-auto d-flex mt-3">
                <button class="w-100 save btn-secondary  me-2"><a href="../index.php">Cancel</a></button>
                <button type="submit" class="w-100 p-2 save btn-primary">Post</button>
            </div>
        </form>
    </div>
</div>
<?php
require_once("../templates/footer.php");
?>