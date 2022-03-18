<!-- REFRESH PAGE TO THE TOP OF PAGE -->

<?php

    $userID = $_GET["userID"];
    header("refresh:0; url=../pages/home.php?userID=$userID")

?>