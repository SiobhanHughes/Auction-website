<?php
    function generateItems($row, $showButtons) {
            $htmlOut = "<tr>";
            $htmlOut .= "<td class='table'>" . $row['photo'] . "</td>";
            $htmlOut .= "<td>";
            $htmlOut .= "<table class='table1'>";
            $htmlOut .= "<tr>";
            $htmlOut .= "<td>" . $row['title'] . "</td>";
            $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Category: '. $row['category'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Condition: ' .$row['cndtn'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Colour: ' . $row['colour'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Description: ' . $row['desc1'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Auction ends: ' . $row['endDate'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Start Price: £' . $row['startPrice'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Reserve Price: £' . $row['reservePrice'] . "</td>";
                $htmlOut .= "</tr>";

                $htmlOut .= "<tr>";
                $htmlOut .= "<td>" . 'Highest Bid: £' . $row['maxBid'] . "</td>";
                $htmlOut .= "</tr>";

            $htmlOut .= "</tr>";
            
        $htmlOut .= "</table>";

        if ($showButtons) {
            $htmlOut .= '<div id = "input">';
            $htmlOut .= '<form method="post" action="bid_watch_form.php">';
            $htmlOut .= '<input id="show-btn" type="submit" name="submit" value="Bid"/>';
            $htmlOut .= '<input id="show-btn" type="submit" name="watch" value="Watch"/>';
            $htmlOut .= '<input type="hidden" name="auctionid" value=' . $row['auctionid'] . "/>";
            $htmlOut .= '</form>';
            $htmlOut .= '</div>';
        }

        $htmlOut .= "</td>";
        return $htmlOut;
    }
?>