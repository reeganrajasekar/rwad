<?php

if ($_POST["email"]=="admin@gmail.com" && $_POST["password"]=="admin") {
    session_start();
    $_SESSION["admin"]="u6rv9tb8pq89u";
    header("Location:/admin/home.php");
    die();
} else {
    header("Location:/admin");
    die();
}
?>