<?php session_start();
require_once("../templates/header.php");
require_once("../templates/nav_bar.php");
require_once("btn_add_post_view.php");
?>

<?php
// CALL FUNCTION OF POST INFORMATION
require_once("../models/post.php");
if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {
    $posts = getPosts();
    if (!empty($posts)) {
        foreach ($posts as $index => $post) {
            $user = getUserById($post["user_ID"]);
            
?>
    
    <div class="card w-100 post border-0 mt-3">
        <div class="card-header px-0 py-2 post-header border-0 w-100 d-flex justify-content-between">
            <div class="post-owner d-flex w-100">
                <a class="profile-contain d-flex" href=""><img src="../images/<?php if($user["gender"] == "M") { echo "man.png"; } else { echo "woman.png"; }; ?>" alt=""></a>
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
                    <li><a href= "../controllers/delete_post_controller.php?post_ID=<?php echo $post['post_ID']; ?>" class="dropdown-item text-danger">Delete</a></li>
                    <li><a href="../views/edit_post_view.php?postId=<?php echo $post["post_ID"]; ?>" class="dropdown-item text-primary">Edit</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0 post-body w-100 border-0">
            <p><?php echo $post["description"]; ?></p>
            <img class="w-100" src="../images/<?php echo $post['image'];?>" alt="">
        </div>

        <div class="card-footer px-0 w-100 py-0 mb-4 border-0 post-footer d-flex justify-content-between">
            <iframe name="like" style="display:none;"></iframe>
            <form action="<?php
                if ($_SERVER["REQUEST_METHOD"] = "POST") {
                    require_once("../controllers/like_controller.php");
                }
            ?>" method="post" class="d-flex like reaction" target="like">
                <input type="hidden" name="postID" value="<?php echo $post["post_ID"] ?>">
                <button type="submit"><i onclick="increaseLike(<?php echo $index; ?>)" class="material-icons like like-icon" id="<?php echo $index; ?>">thumb_up</i></button>
                <span class="px-1"><small class="numberOfLikes" id="<?php echo $index; ?>"><?php echo $post["numberOfLikes"]; ?></small> Likes</span>

                <!-- SCRIPT TO INCREASE LIKE AND CHANGE COLOR-->
                <script>
                    function increaseLike(number) {
                        currentLike = document.querySelectorAll(".numberOfLikes")[number].textContent;
                        document.querySelectorAll(".numberOfLikes")[number].textContent = parseInt(currentLike) + 1;
                        document.querySelectorAll(".like-icon")[number].style.color = "blue";
                    }
                </script>
            </form>

            <div class="d-flex comment reaction">
                <i class="material-icons comment">comment</i>
                <span class="px-1"><?php echo $post["numberOfComments"]; ?> Comments</span>
            </div>
        </div>
    </div>
<?php
        };
    };
};
?>

<!-- FOOTER -->
<?php
require_once("../templates/footer.php");
?>