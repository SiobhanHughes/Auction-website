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
        <h1>Create an account</h1>
      </header>

      <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="../../src/Validate/register.php">
          <input type="text" id="username" name="username" placeholder="Enter Your Username" required/>
          <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Your email" required/>
          <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="At least one lowercase letter, at least one uppercase letter, at least one number, min 8 characters" placeholder="Enter Your Password" required/>
          <input id="show-btn" type="submit" name="submit" value="Register"/>
        </form>
        </div>
        <div id="input">
        <h5>Password must contain the following:</h5>
        <h6>A lowercase letter<h6>
        <h6>A capital (uppercase) letter<h6>
        <h6>A number<h6>
        <h6>Minimum 8 characters<h6>
        </div>
        </div>

    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</>
    </div>
    </div>
  </body>
</html>
