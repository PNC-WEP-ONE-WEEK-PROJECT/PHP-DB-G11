<?php session_start();
require_once("../templates/header.php");
require_once("../templates/nav_bar.php");
?>

    <?php
    // GET USER INFORMATION
    if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {    
        require_once("../models/post.php");
        $user = getUserById($_SESSION["userID"]);
    };
    ?>

    <!-- PROFILE AND DETAILS -->
    <div class="mt-4 profile-container">
        <div class="profile-image-parent">
            <div class="cover-image-container d-flex justify-content-center"><img class="cover-image" src="" width="<?php echo "0%"; ?>" height="<?php echo "0"; ?>"/></div>
            <div class="profile-image-container d-flex">
                <div class="profile-image"><img class="img-circle" src="../images/<?php if($user["gender"] == "M") { echo "man.png"; } else { echo "woman.png"; } ?>" alt="" width="100%" heigh="100%"></div>
                <span class="mb-4 px-4"><?php echo $user["firstName"] . " " . $user["lastName"] ?></span>
            </div>
        </div>
        <div class="profile-details d-flex flex-column mb-5">
            <p class="mb-0">Gender: <?php 
                if ($user["gender"] == "M") {
                    echo "Male";
                } else {
                    echo "Female";
                };
            ?></p>
            <p class="mb-0">Date of birth: <?php 
                if ($user["dateOfBirth"] != "0000-00-00") {
                    $dates = $user["dateOfBirth"]; 
                    $newDate = new DateTime($dates);
                    echo $newDate->format("jS F Y");
                } else {
                    echo "Unknown";
                };
            ?></p>
            <p class="mb-0">Phone: <?php 
                if ($user["phone"] != null) {
                    echo $user["phone"];
                } else {
                    echo "Unknown";
                };
            ?></p>
            <button class="btn-edit-profile w-100 bg-primary mt-3">
                <a class="text-light" href="edit_profile_view.php">EDIT PROFILE</a>
            </button>
            <hr>
        </div>
        
        


        <?php
        // BUTTON CREATE POST
        require_once("btn_add_post_view.php");
        ?>


        <div class="user-won-posts">
        <?php
        // GET USER POSTS
        if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {
            require_once("../models/post.php");
            $posts = getUserPostsByUserId($_SESSION["userID"]);
            if (!empty($posts)) {
                foreach ($posts as $post) {
        ?>
            <div class="card w-100 post border-0 mt-3">
            
                <div class="card-header px-0 py-2 post-header border-0 w-100 d-flex justify-content-between">
                    <div class="post-owner d-flex w-100">
                        <a class="profile-contain d-flex" href=""><img src="../images/<?php if($user["gender"] == "M") { echo "man.png"; } else { echo "woman.png"; } ?>" alt=""></a>
                        <div class="details">
                            <a class="user-name" href=""><?php echo $post["firstName"] . " " . $post["lastName"] ?></a>
                            <p class="m-0"><?php
                                $date = $post["postDate"]; 
                                $newDate = new DateTime($date);
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
                            <li><a href="edit_post_view.php?postId=<?php echo $post["post_ID"]; ?>" class="dropdown-item text-primary">Edit</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card-body px-0 post-body w-100 border-0">
                    <p><?php echo $post["description"] ?></p>
                    <img class="w-100" src="../images/<?php echo $post['image'];?>" alt="">
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
            };
        };
        ?>

        </div>

    </div>

<?php
require_once("../templates/footer.php");
?>