<?php session_start();
require_once("../templates/header.php");
?>
    <!-- FROM TO REGISTER ACCOUNT -->
    <form class="py-5 m-4" action="" method="post">
        <a href="../index.php"><i class="material-icons">arrow_back</i></a>
        <div class="form-title d-flex justify-content-center"><p class="text-primary">REGISTER ACCOUNT</p></div>
        <input class="w-100 fill" type="text" placeholder="Email address" name="email" value="<?php if (isset($_POST["email"])) { echo $_POST["email"]; }; ?>">
        <div class="w-100 fill-block">
            <input class="w-100 fill" name="firstName" type="text" placeholder="First name" value="<?php if (isset($_POST["firstName"])) { echo $_POST["firstName"]; }; ?>">
            <input class="w-100 fill" name="lastName" type="text" placeholder="Last name" value="<?php if (isset($_POST["lastName"])) { echo $_POST["lastName"]; }; ?>">
        </div>
        <div class="w-100 fill-block">
            <input class="w-100 fill" name="password" type="text" placeholder="Create password">
            <input class="w-100 fill" name="cfpassword" type="text" placeholder="Confirm password">
        </div>
        <div class="d-flex mt-4">
            <div class="d-flex gender">
                <input type="radio" name="gender" value="M" id="Man" <?php if (isset($_POST["gender"]) and $_POST["gender"] == "M") { echo "checked"; }; ?>>
                <label for="Man">Man</label>
            </div>
            <div class="d-flex px-3 gender">
                <input type="radio" name="gender" value="F" id="Woman" <?php if (isset($_POST["gender"]) and $_POST["gender"] == "F") { echo "checked"; }; ?>>
                <label for="Woman">Woman</label>
            </div>
        </div>
        <p class="failed-alert m-auto m-0 mb-2 text-danger"><?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once("../controllers/register_account_controller.php");
            };
        ?></p>
        <button type="submit" class="w-100 p-2 save btn-primary btn-register">REGISTER ACCOUNT</button>
    </form>

    <?php
require_once("../templates/footer.php");
?>