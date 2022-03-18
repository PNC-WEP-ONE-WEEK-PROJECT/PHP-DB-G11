<!-- REFRESH PAGE TO THE TOP OF PAGE -->

<?php

    $userID = $_GET["userID"];
    // header("location: ../views/home_view.php?userID=$userID");
    header("refresh:0; url=../views/home_view.php?userID=$userID")

?>