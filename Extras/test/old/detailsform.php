<?php include '../../src/database.php'; ?>
<!doctype html>
<html>

<head>
  <title>Crappy eBAE</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="../css/style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Crappy<span class="logo_colour">eBAE</span></a></h1>
          <h2>Buy your stuff from us</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="../index.php">Home</a></li>
          <li><a href="registerform.php">Register</a></li>
          <li><a href="loginform.php">Log In</a></li>
          <li><a href="search.html">Search</a></li>
        </ul>
      </div>
    </div>
    
    <div id="site_content">

    <header>
      <h1>Enter your details</h1>
    </header>

    <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="../../src/Validate/userdetails.php">
          <input type="text" id="firstname" name="firstname" placeholder="First Name"/>
          <input type="text" id="lastname" name="lastname" placeholder="Last Name"/>
          <input type="text" id="addressline1" name="addressline1" placeholder="Address Line 1"/>
          <input type="text" id="addressline2" name="addressline2" placeholder="Address Line 2"/>
          <input type="text" id="city" name="city" placeholder="City"/>
          <input type="text" id="postcode" name="postcode" placeholder="Post Code"/>
          <input type="text" id="phone" name="phone" placeholder="Phone Number"/>
          <input id="show-btn" type="submit" name="submit" value="Submit"/>
        </form>
      </div>
      </div>

      <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</>
    </div>
    </div>

  </body>
</html>