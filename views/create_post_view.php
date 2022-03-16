<?php
    require_once("../templates/header.php");
?>
    <div class="w-100 pb-3">
        <div class="card border-0 mt-2">
            <form action="../controllers/create_post.php" method="post">
                <div class="w-100">
                    <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto" placeholder="Your Caption Here" rows="auto"></textarea>
                </div>
                <div class="w-100 add-photo d-flex justify-content-center align-items-center bg-secondary">
                    <span class="img-text h-100 w-100">
                    </span>
                </div>
                <div class="w-50 me-0 m-auto d-flex mt-3">
                    <button class="w-100 save btn-secondary me-2">Cancel</button>
                    <button type="submit" class="w-100  save btn-success">Post</button>
                </div>
            </form>
        </div>
    </div>

<?php
require_once("../templates/footer.php");
?>