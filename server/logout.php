<?php
session_start();
    if(isset($_SESSION["username"]) || isset($_SESSION["email"])) {
        session_unset();
        session_destroy();
    }
header("Location:../index.php");