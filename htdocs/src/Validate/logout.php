<?php
  include '../database.php';
  session_start();
  //$user = $_SESSION['username'];
  //$id = $_SESSION['userid'];

    if (isset($_POST['submit'])) {
          if (isset($_SESSION['userid'])) {
           $_SESSION = array(); #clears out session variables with empty array
           //unset($_SESSION['userid']); #clear userid to log out
           //unset($_SESSION['username']); #clear username to log out
            if (isset($_COOKIE[session_name()])) {
              setcookie(session_name(), '', time() - 3600);
            }
            session_unset(); #remove all session variables
            session_destroy(); #clear out the session completely
          }
          setcookie('userid', '', time() - 3600);
          setcookie('username', '', time() - 3600);
          header('Location: ../../frontend/Validate/new/home.php'); #send back to homepage with no user preferences i.e. logged out
          exit();
    }

?>