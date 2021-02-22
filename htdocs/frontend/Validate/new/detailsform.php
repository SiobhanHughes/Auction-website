<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header_blank.php');?>
    
    <div id="site_content">

    <header>
      <h1>Enter your details</h1>
    </header>

    <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="../../../src/Validate/userdetails.php">
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

      <?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>
</html>