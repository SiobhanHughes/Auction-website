<?php include '../src/database.php';
session_start(); 
$id = $_SESSION['userid'];

if (isset($_POST['submit']) && isset($_POST['auctionid'])) {
    $auctionid = $_POST['auctionid'];
    $amount = $_POST['bidVal'];

    // Highest current bid for auction
    $max = "SELECT Max(bidValue) as MaxBid FROM Auction as a, Bids as b
            WHERE a.auctionid = b.auctionid AND a.auctionid = '$auctionid'";
    $getmax =  mysqli_query($connection, $max)
        or die('Error making select bidValue query' . mysql_error());
    $maxBid = mysqli_fetch_array($getmax);
    $row1 = mysqli_num_rows($getmax); // if no bid exists, this will return 0 (no rows to count in the table)
    
    // Insert new user with a bid
    $new = "INSERT INTO Bids (auctionid, buyerid, bidValue) 
            VALUES ('$auctionid', '$id', '$amount')";

    // Update a bid from the current user
    $update = "UPDATE Bids
                SET bidValue = '$amount' WHERE auctionid = '$auctionid' AND buyerid = '$id'";
    
    // if no max bid exists, no one has entered a bid for this auction, so insert the user into Bids table
    if ($row1 == 0) {
        if (!mysqli_query($connection, $new)) {
            die('Error: ' . mysqli_error($connection));
        }
        else {
            header('Location: bid_watch_button.php'); //send back to index page (logged in, so personal page updated)
            exit();
        }
    }
    else {
        // A max bid exists, check that new bid is higher than max bid
        if ($amount <= $maxBid['MaxBid']) {
            $error = "Your bid is too low!";
            $info = " The current highest bid for your item is £" . $maxBid['MaxBid'];
            header("Location: bid_watch_button.php?error=" . urlencode($error) . urlencode($info)); // error - need to start again
            exit();
        }
        else {
            // if they have have bid on this auction before - Update Bids table with new bid. Else, insert as new row
            
            $bidstable = "SELECT * FROM Bids WHERE auctionid = '$auctionid' AND buyerid = '$id'";
            $gettable =  mysqli_query($connection, $bidstable)
                or die('Error making select bidValue query' . mysql_error());
            $row2 = mysqli_num_rows($gettable); // if this returns 0, insert user as new bidder for this auction, else update
            
            if ($row2 == 0) {
                if (!mysqli_query($connection, $new)) {
                    die('Error: ' . mysqli_error($connection));
                }
                else {
                    header('Location: bid_watch_button.php'); //send back to index page (logged in, so personal page updated)
                    exit();
                }  

            }
            else {
                if (!mysqli_query($connection, $update)) {
                    die('Error: ' . mysqli_error($connection));
                }
                else {
                    header('Location: bid_watch_button.php'); //send back to index page (logged in, so personal page updated)
                    exit();

                }

            }


        }



    } 

}
   
    
?>