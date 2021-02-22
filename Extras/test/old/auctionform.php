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
          <li><a href="auction.html">New Auction</a></li>
          <li><a href="logoutform.php">Logout</a></li>
        </ul>
      </div>
    </div>
    
    <div id="site_content">


      <header>
        <h1>Create New Auction</h1>
        <header>

        <div id = "input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="../../src/Validate/auction.php">
          <div>
            <h4>Title</h4>
            <input type="text" name="title" placeholder="Enter the title of this auction" required/>
          </div>
          <div>
            <h4>Category</h4>
            <input type="text" name="category" placeholder="Enter the cateogry of the item" required/>
          </div>
          <div>
            <h4>Condition</h4>
            <select name="condition">
              <option value="new">New</option>
              <option value="used">Used</option>
            </select>
          </div>
          <br>
          <div>
            <h4>Description</h4>
            <textarea name="description" cols="30" rows="5" placeholder="Give a brief description about your item"></textarea>
          </div>
          <div>
            <h4>Colour</h4>
            <input type="text" name="colour" placeholder="What are the main colours of this item?" required/>
          </div>
          <div>
            <h4>Starting Price</h4>
            <input type="text" name="start-price" placeholder="Enter the starting price for this auction" required/>
          </div>
          <div>
            <h4>Reserve Price</h4>
            <input type="text" name="reserve-price" placeholder="Enter the reserve price for this auction" required/>
          </div>
          <div>
            <h4>Ending Date</h4>
            <input type="date" name="end-date">
          </div>
          <input id="show-btn" type="submit" name="submit" value="Create Auction"/>
        </form>
      </div>
    </div>

    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
    </div>
    </div>

  </body>
</html>