<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: registation.php");
        exit();
    }
?>
