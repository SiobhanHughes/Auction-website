<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/src/generateItems.php'); ?>
<?php include '../../../src/database.php'; ?>

<div id="site_content">
    <div id="content">


<html>
<h3>Enter your bid for the following item</h3>
</html>

        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        </br>

<?php 


if (isset($_POST['submit']) && isset($_POST['auctionid'])) {
    $auctionid = $_POST['auctionid'];
    // Info of item rendered and input field/button to enter bid value via html form
    $item = "SELECT i.photo, i.title, i.category, i.cndtn, i.colour, i.desc1, a.endDate, MAX(b.bidValue) as maxBid, a.startPrice, a.reservePrice, a.auctionid
        FROM Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        WHERE isFinished = 0 AND a.auctionid = $auctionid";

    $bid =  mysqli_query($connection, $item)
        or die('Error making select auction query' . mysqli_error($connection));
    
    echo '<table>';
    while ($row = mysqli_fetch_array($bid)){
        echo generateItems($row, FALSE, FALSE);
    }
    echo '</table>';
    mysqli_close($connection);
}
elseif (isset($_GET['auctionid'])) {
    $auctionid = $_GET['auctionid'];

    $item = "SELECT DISTINCT i.photo, i.title, i.category, i.cndtn, i.colour, i.desc1, a.endDate, MAX(b.bidValue) as maxBid, a.startPrice, a.reservePrice, a.auctionid
        FROM Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        AND isFinished = 0 WHERE isFinished = 0 AND a.auctionid = $auctionid";

    $bid =  mysqli_query($connection, $item)
        or die('Error making select auction query' . mysqli_error($connection));
    
    echo '<table>';
    while ($row = mysqli_fetch_array($bid)){
        echo generateItems($row, FALSE, FALSE);
    }
    echo '</table>';
    mysqli_close($connection);

}
elseif (isset($_POST['watch']) && isset($_POST['auctionid'])) {
    $auctionid = $_POST['auctionid'];
    $watch = "INSERT INTO Watch (auctionid, userid) 
            VALUES ('$auctionid', '$_SESSION[userid]')";
    if (!mysqli_query($connection, $watch)) {
        die('Error: ' . mysqli_error($connection));
    }
    else {
        mysqli_close($connection);
        header('Location: home.php');
        exit();
    }
}
?>


<html>
</br>
    <div id="input">
        <form method="post" action="../../../src/Validate/bid.php">
            <input type ="number" min="0.00" step="0.01" name="bidVal" placeholder="Enter your bid" required/>
            <input id="show-btn" type="submit" name="submit" value="Enter"/>
            <input type="hidden" name="auctionid" value="<?php echo $auctionid; ?>" />  
        </form>
    </div>
    </div>
    </div>
</html>

