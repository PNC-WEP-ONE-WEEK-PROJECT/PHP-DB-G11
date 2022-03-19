<?php
require_once("../templates/header.php");
require_once("../templates/nav_bar.php");
require_once("btn_add_post_view.php");
?>

<?php
// CALL COMMENTS POST
require_once("../controllers/post_comment_controller.php");

// CALL FUNCTION OF POST INFORMATION
require_once("../models/post.php");
$posts = getPosts();
foreach ($posts as $post) {
?>
    <div class="card w-100 post border-0 mt-3">
        <div class="card-header px-0 py-2 post-header border-0 w-100 d-flex justify-content-between">
            <div class="post-owner d-flex w-100">
                <a class="profile-contain d-flex" href=""><img src="../images/image-62296add80e539.04751305.jpg" alt=""></a>
                <div class="details">
                    <a class="user-name" href=""><?php echo $post["firstName"]  . " " . $post["lastName"] ?></a>
                    <p class="m-0">
                        <?php  
                        $dates = $post["postDate"]; 
                        $newDate = new DateTime($dates);
                        echo $newDate->format("l jS F Y h:i:s A");
                    
                    ?></p>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="bg-light" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons post-menu">more_horiz</i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href= "../controllers/delete_post_controller.php?post_ID=<?php echo $post['post_ID']; ?>&userID=<?php echo $_GET["userID"]; ?>" class="dropdown-item text-danger">Delete</a></li>
                    <li><a href="../views/edit_post_view.php?postId=<?php echo $post["post_ID"]; ?>&userID=<?php echo $_GET["userID"]; ?>" class="dropdown-item text-primary">Edit</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0 post-body w-100 border-0">
            <p><?php echo $post["description"]; ?></p>
            <img class="w-100" src="../images/<?php echo $post['image'];?>" alt="">
        </div>

        <div class="card-footer px-0 w-100 py-0 mb-4 border-0 post-footer d-flex justify-content-between">
            <div class="d-flex like reaction">
                <i class="material-icons">thumb_up</i>
                <span class="px-1"><?php echo $post["numberOfLikes"]; ?> Likes</span>
            </div>
            <a href="" class="d-flex comment reaction">
                <i class="material-icons">comment</i>
                <span class="px-1"><?php echo $post["numberOfComments"]; ?> Comments</span>
            </a>
        </div>

        <!--  -->
        <dialog open class="w-75 show-comment overflow-scroll">
            <div class="comment-controll w-100">
                <div class="leav-comment text-secondary">
                    <i class="material-icons ">keyboard_backspace</i>
                </div>
                
                <iframe name="comment" style="display:none;"></iframe>
                <form class="content-comment d-flex justify-content-end align-items-center" action="<?php
                    if ($_SERVER["REQUEST_METHOD"] = "POST" and isset($_POST["comment"])) {
                        $postID = $post["post_ID"];
                        $userID = $_GET["userID"];
                        require_once("../controllers/create_comment_controller.php?postID=$postID&userID=$userID");
                    }
                ?>" method="post" target="comment">
                    <a href="" class="me-1" ><img class="img-pro rounded-circle" src="../images/logo.png" alt=""></a>
                    <input name="comment" class="w-100 rounded-pill ps-3 pt-1 pb-2 h-100" placeholder="Type here..." type="text">
                    <button class="bg-light" type="submit"><img class="img-send" src="../images/send.png" alt=""></button>
                </form>
                <hr>
            </div>
            <!-- GET COMMENTS -->
            <div class="">
                
                <?php 
                foreach($comments as $comment)  :
                    if($post['post_ID'] == $comment['post_ID']){
                    
                ?>
                <div class="content-comment mt-3 d-flex justify-content-end">
                    <a href="" class="me-1" ><img class="img-pro rounded-circle" src="../images/logo.png" alt=""></a>
                    <span class="rounded pt-0 px-2 h-100 border-2 border-primary bg-secondary "> 
                        <?php 
                            echo $comment['content'];
                        ?> 
                    </span>
                    <button type="submit" ><i class="material-icons text-danger">delete_forever</i></a>
                </div>

                <?php
                    };
                endforeach ?>
            </div>
        </dialog>
    </div>
<?php
};
?>

<!-- FOOTER -->
<?php
require_once("../templates/footer.php");
?>