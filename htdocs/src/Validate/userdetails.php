<?php
  include '../database.php';
  session_start();
  $user = $_SESSION['username'];
  $id = $_SESSION['userid'];

  if (isset($_SESSION['userid'])) {
    if (isset($_POST['submit'])) {
      $firstname = trim(mysqli_real_escape_string($connection, $_POST['firstname']));
      $lastname = trim(mysqli_real_escape_string($connection, $_POST['lastname']));
      $addressline1 = trim(mysqli_real_escape_string($connection, $_POST['addressline1']));
      $addressline2 = trim(mysqli_real_escape_string($connection, $_POST['addressline2']));
      $city = trim(mysqli_real_escape_string($connection, $_POST['city']));
      $postcode = trim(mysqli_real_escape_string($connection, $_POST['postcode']));
      $phone = trim(mysqli_real_escape_string($connection, $_POST['phone']));


     if (!isset($firstname) || $firstname == '' || !isset($lastname) || $lastname == '' || !isset($addressline1) || $addressline1 == '' || !isset($addressline2) || $addressline2 == '' || !isset($city) || $city == '' || !isset($postcode) || $postcode == '' || !isset($phone) || $phone == '') {
        $error = "Please fill in all your details";
        header("Location: ../../frontend/Validate/new/detailsform.php?error=" . urlencode($error));
       exit();
      }
      else {
        $details = "UPDATE Users
                  SET firstname = '$firstname', lastname = '$lastname', addressline1 = '$addressline1', addressline2 = '$addressline2', city = '$city', postcode = '$postcode', phone = '$phone'
                  WHERE userid = '$id'";
        if (!mysqli_query($connection, $details)) {
          die('Error: ' . mysqli_error($connection));
        }
        else {
          mysqli_close($connection);
          header ('Location: ../../frontend/Validate/new/home.php');
          exit();
        }
      }
    }
  }
?>