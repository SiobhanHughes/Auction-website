<?php
    include_once "database.php";

    function generatePersonalBidding($query, $showButtons, $showWatch, $conn) {
        $display = mysqli_query($conn, $query)
        or die('Error making select personal query' . mysqli_error($conn));
        $count = mysqli_num_rows($display);
        if ($count == 0) {
            echo "None";
        }
        echo '<table>';
        while ($row = mysqli_fetch_array($display))
        {
            $maxbid = "SELECT MAX(bidValue) as MaxBid
            from Auction a
            LEFT JOIN Bids b ON b.auctionid = a.auctionid
            WHERE a.auctionid = $row[auctionid] and b.win = 'No' and a.isFinished = 0
            GROUP BY a.auctionid";
            $max = mysqli_query($conn, $maxbid)
            or die('Error making select max bid query' . mysqli_error($conn));

            while ($row2 = mysqli_fetch_array($max)) {
                echo generateItemsBidding($row, $row2, $showButtons, $showWatch);
            }
        }
        echo '</table>';
    }
?>