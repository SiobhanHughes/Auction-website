<?php include '../src/database.php';?>
<?php include '../src/generateItems.php';?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Crappy eBAE</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Crappy<span class="logo_colour">eBAE</span></a></h1>
          <h2>Buy your stuff from us</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="Validate/registerform.php">Register</a></li>
          <li><a href="Validate/loginform.php">Log In</a></li>
          <li><a href="search.html">Search</a></li>
          <li><a href="Validate/checksession.php">Session</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">


      <div id="content">
        <!-- insert the page content here -->
        <h1>Welcome to our Auction Site</h1>
      

      <div id='table'>
      <?php

      $Item = 'SELECT * FROM Items';
      $display =  mysqli_query($connection, $Item)
      or die('Error making select users query' . mysql_error());
      echo '<table>';

      while ($row = mysqli_fetch_array($display))
      {
        echo generateItems($row, true);
      }
      echo '</table>';
      ?>
      </div>
    
      <!-- <style>
        .table {
          width: 50%;
          background: grey;
          color: black;
          border: none;
        }
        
        .tablet {
          color: green;

        } -->

      </style>


      <!-- <table>
          <tr>
              <td>
                  <p>This is a paragraph</p>
                  <p>This is another paragraph</p>
              </td>
              <td>
                  This cell contains a table:
                  <table>
                      <tr>
                          <td>A</td>
                          <td>B</td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table> -->




      </div>
    </div>
    

  



    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
    </div>
  </div>
</body>
</html>




<!-- echo '<tr><td>'. $row['category'].
      '<tr><td>'. $row['photo'].
      '</td><td>'. $row['title'].
      '</td><td>'. $row['colour'].
      '</td><td>'. $row['size'].
      '</td><td>'. $row['desc1'].
      '</td><td>'. $row['desc2'].
      '</td></tr>';  -->
