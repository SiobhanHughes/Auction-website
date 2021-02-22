<?php
    include($_SERVER["DOCUMENT_ROOT"] .'/src/database.php');
    session_start();
    function isLoggedIn() {
        if (isset($_SESSION['username'])) {
            return true;
        } 
        return false;
    }
    if (isLoggedIn()) { 
        include 'headerLoggedIn.php';
    } else {
        include 'headerLoggedOut.php';
    }
?>