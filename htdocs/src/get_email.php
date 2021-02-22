<?php include 'database.php';
    include_once 'sendEmail.php';
    session_start();

    function notifyBidders($conn, $auction_id) {
        $notify = "SELECT email, firstname, lastname FROM Users u, Bids b, Watch w
                    WHERE b.auctionid = $auction_id
                    AND w.auctionid = $auction_id
                    AND b.buyerid != $_SESSION[userid]
                    AND w.userid != $_SESSION[userid]
                    AND(u.userid = b.buyerid OR u.userid = w.userid)"; 
                #get emails of users that have been outbid (both buyers and users watching this auction)                
        $message_first = "An item you have bid on or are watching has received a new highest bid.";
        $message_second = "Please log in and check your personal page for details.";
        $message_final = $message_first . "\n" . $message_second;
        $sign_off = "Best, " . "\n" . "Diagon Alley";
        $emails = mysqli_query($conn, $notify)
            or die("Error making select emails query" . mysqli_error($conn));
        while ($row = mysqli_fetch_array($emails)) {
            $email = $row['email'];
            $message = "Dear " . $row['firstname'] . " " . $row['lastname'] . "," . "\n\n" 
                        . $message_final . "\n\n" . $sign_off;
            sendMail($email, 'Diagon Alley Update', $message);
        }  
    }
?>