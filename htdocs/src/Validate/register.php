  <?php
  include '../database.php';
  session_start();

  if (isset($_POST['submit'])) {
    $username = trim(mysqli_real_escape_string($connection, $_POST['username']));
    $email = trim(mysqli_real_escape_string($connection, $_POST['email']));
    $password = trim(mysqli_real_escape_string($connection, $_POST['password']));
    $passhash = password_hash($password, PASSWORD_DEFAULT);

    if (!isset($username) || $username == '' || !isset($email) || $email == '' || !isset($password) || $password == '') {
      $error = "Please fill in your username, email and password";
      header("Location: ../../frontend/Validate/new/registerForm.php?error=" . urlencode($error));
      exit();
    }
    else {
      #check that username is unique
      $unique = 'SELECT username FROM Users';
      $isunique =  mysqli_query($connection, $unique)
        or die('Error making select username query' . mysql_error());
        
        while ($name = mysqli_fetch_array($isunique)) 
        {
          if ($username == $name['username']){
            $error2 = 'Username not available. Please register again';
            mysqli_close($connection);
            header("Location: ../../frontend/Validate/new/registerForm.php?error=" . urlencode($error2));
            exit();
          }
        }
      # insert new user into database
      $newuser = "INSERT INTO Users (username, email, passwordhash) 
      VALUES ('$username', '$email', '$passhash')";
      if (!mysqli_query($connection, $newuser)) {
        die('Error: ' . mysqli_error($connection));
      }
      else {
        $userid = mysqli_insert_id($connection);
        # get userid from database, set userid and username for the session ($_SESSION superglobal)

        // $id = "SELECT userid FROM Users WHERE username = '$username'";
        // $getid = mysqli_query($connection, $id)
        //   or die('Error making select userid query' . mysql_error());

        // $userid = mysqli_fetch_array($getid);

        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        setcookie('userid', $userid, time() + (60*60*24*30));
        setcookie('username', $username, time() + (60*60*24*30));
        mysqli_close($connection);
        header('Location: ../../frontend/Validate/new/detailsform.php');
        exit();
        }
      }
    }
?>
