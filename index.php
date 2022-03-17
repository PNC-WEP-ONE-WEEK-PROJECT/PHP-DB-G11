<?php
require_once("templates/header.php");
require_once("templates/btn_add_post.php");
?>

<?php
require_once("models/post.php");
$posts = getPosts();
foreach ($posts as $post) {
?>
    <div class="card w-100 post border-0 mt-3">
        <div class="card-header px-0 py-2 post-header border-0 w-100 d-flex justify-content-between">
            <div class="post-owner d-flex w-100">
                <a class="profile-contain d-flex" href=""><img src="images/image-62296add80e539.04751305.jpg" alt=""></a>
                <div class="details">
                    <a class="user-name" href=""><?php echo $post["firstName"] . " " . $post["lastName"] ?></a>
                    <p class="m-0"><?php echo $post["postDate"]; ?></p>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="bg-light" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons post-menu">more_horiz</i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href= "controllers/delete_post.php?post_ID=<?php echo $post['post_ID'] ?>" class="dropdown-item text-danger">Delete</a></li>
                    <li><a href="views/edit_post_view.php?postId=<?php echo $post["post_ID"] ?>" class="dropdown-item text-primary">Edit</a></li>
                </ul>
            </div>
        </div>

        <div class="card-body px-0 post-body w-100 border-0">
            <p><?php echo $post["description"] ?></p>
            <img class="w-100" src="images/<?php echo $post['image'] ?>"  alt="">
        </div>

        <div class="card-footer px-0 w-100 py-0 mb-4 border-0 post-footer d-flex justify-content-between">
            <div class="d-flex like reaction">
                <i class="material-icons">thumb_up</i>
                <span class="px-1"><?php echo $post["numberOfLikes"]; ?> Likes</span>
            </div>
            <div class="d-flex comment reaction">
                <i class="material-icons">comment</i>
                <span class="px-1"><?php echo $post["numberOfComments"]; ?> Comments</span>
            </div>
        </div>
    </div>
<?php
};
?>

<!-- FOOTER -->
<?php
require_once("templates/footer.php");
?>