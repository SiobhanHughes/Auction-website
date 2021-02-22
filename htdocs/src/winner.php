<?php
include_once 'database.php';
include_once 'sendEmail.php';
session_start();

// script to be run after sql create event ends the auction (midnight) by setting isFinished = 1
// Auctions finished the day before (INTERVAL 1 DAY) are tested to determine the winner of the auction (win set to Yes in Bids) and email sent to winner and seller
function generateMessage($email, $chosenMessage, $noWin) {
    if ($noWin) {
        $messageSecond = "";
    } else {
        $messageSecond = "Please log in to your account and check your personal page for details.";
    }
    $sign_off = "Best, " . "\n" . "Diagon Alley";
    $messageBody = $chosenMessage . "\n" . $messageSecond;
    $message = "Dear " . $email['firstname'] . " " . $email['lastname'] . "," . "\n\n" 
    . $messageBody . "\n\n" . $sign_off;
    return $message;
}

$winner = 'SELECT MAX(b.bidValue) as MaxBid, a.auctionid
            FROM Bids b, Auction a
            WHERE b.auctionid = a.auctionid and b.bidValue >= reservePrice
            AND a.auctionid in (SELECT auctionid
                                FROM Auction
                                WHERE endDate = CURDATE()-INTERVAL 1 DAY)
            GROUP BY a.auctionid';

$win =  mysqli_query($connection, $winner)
    or die('Error making select winner query' . mysqli_error($connection));

// set win in Bids table 
while ($row = mysqli_fetch_array($win)) {
    $bid = $row["MaxBid"];
    $auctionid = $row["auctionid"];
    $updateWin = "UPDATE Bids SET win = 'Yes' WHERE bidValue = $bid AND auctionid = $auctionid";
    $setwin =  mysqli_query($connection, $updateWin)
        or die('Error making set win in Bids table query' . mysqli_error($connection));
}
// get winner and seller of auctions that ended the day before - send email
$getWinner = 'SELECT u.firstname, u.lastname, u.email, i.title
                FROM Users u, Bids b, Auction a, Items i
                WHERE b.auctionid = a.auctionid AND b.buyerid = u.userid
                AND i.itemid = a.itemid and b.win = "Yes"
                AND a.auctionid in (SELECT auctionid
                                    FROM Auction WHERE endDate = CURDATE()-INTERVAL 1 DAY)';
$emailWinner = mysqli_query($connection, $getWinner)
        or die('Error making get winner query' . mysqli_error($connection));

while ($email = mysqli_fetch_array($emailWinner)) {
    $item = $email['title'];
    $email_address = $email['email'];
    $messageWinnerFirst = "Congratulations! You have won the auction for " . $item . ".";
    $message = generateMessage($email, $messageWinnerFirst, false);
    sendMail($email_address, 'Diagon Alley Update', $message);
    echo "Notified Winner";
    echo '<br>';
}
                        
$getSeller = 'SELECT u.firstname, u.lastname, u.email, i.title
                FROM Users u, Bids b, Auction a, Items i
                WHERE b.auctionid = a.auctionid AND a.sellerid = u.userid 
                AND i.itemid = a.itemid and b.win = "Yes"
                AND a.auctionid in (SELECT auctionid
                                    FROM Auction WHERE endDate = CURDATE()-INTERVAL 1 DAY)';

$emailSeller = mysqli_query($connection, $getSeller)
        or die('Error making get seller query' . mysqli_error($connection));

while ($email = mysqli_fetch_array($emailSeller)) {
    $item = $email['title'];
    $email_address = $email['email'];
    $messageSeller = "Your auction for  " . $item . " was succesful and it has been sold!";
    $message = generateMessage($email, $messageSeller, false);
    sendMail($email_address, 'Diagon Alley Update', $message);
    echo "Notified Seller that their item sold";
    echo '<br>';
}

// get seller of auctions that ended the day before and notify them that there are no winners for their auction
$getNoWin = 'SELECT DISTINCT firstname, lastname, email, title
            FROM Auction a
            LEFT JOIN Bids b ON b.auctionid = a.auctionid
            LEFT JOIN Items i ON i.itemid = a.itemid
            LEFT JOIN Users u ON a.sellerid = u.userid
            WHERE a.auctionid in (SELECT auctionid
                                    FROM Auction
                                    WHERE endDate = CURDATE()-INTERVAL 1 DAY)
            AND a.auctionid not in (SELECT auctionid
                                    FROM Bids
                                    WHERE win = "Yes")';

$emailNoWin = mysqli_query($connection, $getNoWin)
        or die('Error making get no win query' . mysqli_error($connection));

while ($email = mysqli_fetch_array($emailNoWin)) {
    $item = $email['title'];
    $email_address = $email['email'];
    $messageNoWinFirst = "Your auction for  " . $item . " has ended and the item did not sell.";
    $messageNoWinSecond = "You may auction this item again. Consider lowering the reserve price in order to sell it.";
    $messageNoWin = $messageNoWinFirst . "\n" . $messageNoWinSecond;
    $message = generateMessage($email, $messageNoWin, true);    
    sendMail($email_address, 'Diagon Alley Update', $message);
    echo "Notified Seller that item did not sell";
    echo '<br>';
}

mysqli_close($connection);

?>
