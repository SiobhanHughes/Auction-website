<?php include '../src/database.php'; ?>
<?php include 'generateBidItems.php'; ?>
<?php// session_start(); ?>

<html>
<h3>Enter your bid for the following item</h3>
</html>

<?php
if (isset($_POST['submit']) && isset($_POST['auctionid'])) {
    $auctionid = $_POST['auctionid'];
    // Info of item rendered and input field/button to enter bid value via html form
    $item = "SELECT photo, title, category, cndtn, colour, desc1, endDate, MAX(bidValue) as maxBid, startPrice, reservePrice
            FROM Items as i, Auction as a, Bids as b
            WHERE i.itemid = a.itemid AND a.auctionid = b.auctionid
            AND isFinished = 0 AND a.auctionid = $auctionid";
    $bid =  mysqli_query($connection, $item)
        or die('Error making select auction query' . mysql_error());
    
    while ($row = mysqli_fetch_array($bid)){
        echo generateItems($row, FALSE, FALSE);
    }

}
elseif (isset($_POST['watch']) && isset($_POST['auctionid'])) {
    $auctionid = $_POST['auctionid'];
    echo "This is posted by clicking the Watch2 button: " . $auctionid;
    exit();
    // update database to add auctionid and userid to watch table and send user back to homepage (exit()) - item should appear in their watch list
}
?>


<html>
</br>
    <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        </br>
        <form method="post" action="bid.php">
            <input type ="number" min="0.00" step="0.01" name="bidVal" placeholder="Enter your bid" required/>
            <input id="show-btn" type="submit" name="submit" value="Enter"/>
            <input type="hidden" name="auctionid" value="<?php echo $auctionid; ?>" />  
        </form>
    </div>
</html>

