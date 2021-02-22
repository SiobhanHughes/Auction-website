<?php include '../src/database.php'; ?>
<?php //session_start(); ?>

<?php $auctionid2 = "2"; ?>

<!doctype html>
<html>

<body>
        <header>
        <h1>Bid Button test</h1>
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <header>

        <div id = "input">
        <form method="post" action="bid_watch_form.php">
          <input id="show-btn" type="submit" name="submit" value="Bid"/>
          <input id="show-btn" type="submit" name="watch" value="Watch"/>
          <input type="hidden" name="auctionid" value="<?php echo $row['auctionid']; ?>" />
        </form>
        </div>

        <div id = "input">
        <form method="post" action="bid_watch_form.php"> 
          <input id="show-btn" type="submit" name="submit" value="Bid2"/>
          <input id="show-btn" type="submit" name="watch" value="Watch2"/>
          <input type="hidden" name="auctionid" value="<?php echo $auctionid2; ?>" />  
        </form>
        </div>



  </body>
</html>