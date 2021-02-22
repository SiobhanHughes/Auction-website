<?php
    include '../src/database.php';
    session_start();
    function isLoggedIn() {
        if (isset($_SESSION['username'])) {
            return true;
        } 
        return false;
    }
?>