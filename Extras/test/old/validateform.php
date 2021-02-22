<?php include '../src/database.php'; ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Auction Site</title>
  </head>
  <body>
    <div id="container">
      <header>
        <h1>Welcome to Crappy eBay!</h1>
      </header>
      <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <header>
          <h3>Create an account</h3>
        <header>
        <form method="post" action="../src/register.php">
          <input type="text" id="username" name="username" placeholder="Enter Your Username" required/>
          <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Your email" required/>
          <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="At least one lowercase letter, at least one uppercase letter, at least one number, min 8 characters" placeholder="Enter Your Password" required/>
          <input id="show-btn" type="submit" name="submit" value="Register"/>
        </form>
        </div>
        <div id="input">
        <h5>Password must contain the following:</h5>
        <p id="letter" class="invalid"><h6>A <b>lowercase</b> letter<h6></p>
        <p id="capital" class="invalid"><h6>A <b>capital (uppercase)</b> letter<h6></p>
        <p id="number" class="invalid"><h6>A <b>number</b><h6></p>
        <p id="length" class="invalid"><h6>Minimum <b>8 characters</b><h6></p>
        <br />
        <br />
        </div>
        <div id = "input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <header>
          <h3>Login</h3>
        <header>
        <form method="post" action="../src/login.php">
          <input type="text" id="username" name="username" placeholder="Enter Your Username"/>
          <input type="password" id="password" name="password" placeholder="Enter Your Password"/>
          <input id="show-btn" type="submit" name="submit" value="Login"/>
        </form>
      </div>
    </div>
  </body>
</html>