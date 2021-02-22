  
<?php
  session_start();
  if (isset($_POST['submit'])) {
    $startdate = $_POST['datefield_startdate'];
    $endate = $_POST['datefield_enddate'];
    if ($startdate >= $endate) {
      $error = "Please enter valid start date and end date";
      header("Location: ../frontend/StartDate_endDate.html?error=" . urlencode($error));
      exit();
    }
  }
?>