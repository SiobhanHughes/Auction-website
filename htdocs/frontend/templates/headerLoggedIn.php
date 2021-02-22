<!doctype html>
<html>
<?php $hpImage = '/frontend/css/style/hpicon.png'; ?>
<head>
  <title>Diagon Alley</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href=<?php $_SERVER["DOCUMENT_ROOT"] . "/css/style/style.css"?> title="style" />
</head>


<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1>Diagon <span class="logo_colour">Alley</span></h1>
          <h4>Supplies for Wizards, Witches and maybe even Muggles!</h4>
          <br>
          <img class="banner-img" src="<?php echo $hpImage; ?>" alt="hp">
        </div>
      </div>
      <div id="menubar">
        <br>
        <ul id="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="auctionForm.php">New Auction</a></li>
            <li><a href="personal.php">Personal</a></li>
            <li><a href="logoutForm.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>