<?php
    session_start();
    if(!isset($_SESSION["idMurid"])) {
        header("Location: login.php");
        exit();
    }
?>