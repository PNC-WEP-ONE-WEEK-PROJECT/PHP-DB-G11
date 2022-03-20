<?php session_start();
    require_once("../templates/header.php");
?>

    <?php
    // GET USER INFORMATION
    require_once("../models/post.php");
    $userID = $_SESSION["userID"];
    $userInfo = getUserById($userID)

    ?>

    <form class="py-5 m-4" action="<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once("../controllers/edit_profile_controller.php");
        };
    ?>" method="post">
        <div class="form-title d-flex justify-content-center"><p class="text-primary">UPDATE PROFILE</p></div>
            <span class="img-text h-100 w-100 d-flex justify-content-center align-items-center">
                <input class="h-100 w-100  upload-img ps-5" type="file" id="image" name="image">
            </span>
        </div>
        <label for="email">Email address</label>
        <input class="w-100 fill" id="email" type="text" placeholder="Email address" name="email" value="<?php echo $userInfo["email"]; ?>">
        <div class="w-100 fill-block">
            <div>
                <label for="firstname">First name</label>
                <input class="w-100 fill"  id="firstname" name="firstName" type="text" placeholder="First name" value="<?php echo $userInfo["firstName"]; ?>">
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input class="w-100 fill"  id="lastname" name="lastName" type="text" placeholder="Last name" value="<?php echo $userInfo["lastName"]; ?>">
            </div>
        </div>
        <div class="w-100 fill-block">
            <div>
                <label for="dateofbirth">Date of birth</label>
                <input class="w-100 fill" name="dateOfBirth"   id="dateofbirth" type="date" value="<?php echo $userInfo["dateOfBirth"]; ?>">
            </div>
            <div>
                <label for="phone">Phone number</label>
                <input class="w-100 fill" name="phone"  id="phone" type="numbers" placeholder="Phone number" value="<?php echo $userInfo["phone"]; ?>">
            </div>
        </div>
        <div class="d-flex mt-4">
            <div class="d-flex gender">
                <input type="radio" name="gender" value="M" id="Man" <?php if ($userInfo["gender"] == "M") { echo "checked"; }; ?>>
                <label for="Man">Man</label>
            </div>
            <div class="d-flex px-3 gender">
                <input type="radio" name="gender" value="F" id="Woman" <?php if ($userInfo["gender"] == "F") { echo "checked"; }; ?>>
                <label for="Woman">Woman</label>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button class="p-2 save btn-warning db-button"><a href="profile_view.php">Cancel</a></button>
            <button type="submit" class="p-2 save btn-primary db-button">SAVE</button>
        </div>
    </form>
<?php
require_once("../templates/footer.php");
?>