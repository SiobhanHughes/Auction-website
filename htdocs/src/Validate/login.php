<?php
  include '../database.php';
  session_start();


    if (isset($_POST['submit'])) {
        $username = trim(mysqli_real_escape_string($connection, $_POST['username']));
        $password = trim(mysqli_real_escape_string($connection, $_POST['password']));


        if (!isset($username) || $username == '' || !isset($password) || $password == '') {
        $error = "Please fill in your username and password to log in";
        header("Location: ../../frontend/Validate/new/loginForm.php?error=" . urlencode($error));
        exit();
        }
        else {
            #logic to check username correct and matches passowrd, else error
            $query = "SELECT userid, username, passwordhash FROM Users WHERE username = '$username'" ;
            $result = mysqli_query($connection, $query)
                or die('Error making select users query' . mysqli_error($connection));

            $check = mysqli_num_rows($result);
            if ($check == 0) {
                $error2 = 'Incorrect Username. Please re-enter your username and password to log in';
                mysqli_close($connection);
                header("Location: ../../frontend/Validate/new/loginForm.php?error=" . urlencode($error2));
                exit();
            }
            else {
                $row = mysqli_fetch_array($result);
                if ($row['username'] == $username && password_verify($password, $row['passwordhash'])) {
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['username'] = $username;
                    setcookie('userid', $row['userid'], time() + (60*60*24*30));
                    setcookie('username', $row['username'], time() + (60*60*24*30));
                    mysqli_close($connection);
                    header('Location: ../../frontend/Validate/new/home.php'); #send to homepage with user preferences
                    exit();
                    }
                else {
                    $error3 = 'Incorrect login. Please enter your username and password to log in';
                    mysqli_close($connection);
                    header("Location: ../../frontend/Validate/new/loginForm.php?error=" . urlencode($error3));
                    exit();

                }
            }
        }
    }
?>