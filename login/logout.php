<?php
    session_start();
    unset($_COOKIE['email']);
    unset($_COOKIE['password']);
    session_destroy();

    Header("Location: index.php");

?>