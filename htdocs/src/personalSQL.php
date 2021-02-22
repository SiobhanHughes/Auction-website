<?php
    function getQueries($userid) {
        // <!-- -- for SELLING section -->
        $selling = "SELECT a.auctionid, photo, title, category, cndtn, colour, desc1, endDate, MAX(bidValue) as maxBid, startPrice, reservePrice
        from Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        WHERE sellerid = $userid and a.isFinished = 0
        GROUP BY a.auctionid";
        
        // <!-- -- for BID section -->
        $bidding = "SELECT a.auctionid, photo, title, category, cndtn, colour, desc1, endDate, bidValue, startPrice, reservePrice
        from Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        WHERE buyerid = $userid and b.win = 'No' and a.isFinished = 0
        GROUP BY a.auctionid";

        // <!-- -- for WATCH section -->
        $watching = "SELECT a.auctionid, photo, title, category, cndtn, colour, desc1, endDate, MAX(bidValue) as maxBid, startPrice, reservePrice
        from Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Watch w ON w.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        WHERE w.userid = $userid and a.isFinished = 0
        GROUP BY a.auctionid";
        
        // <!-- -- for items already bought -->
        $bought = "SELECT a.auctionid, photo, title, category, cndtn, colour, desc1, endDate, MAX(bidValue) as maxBid, startPrice, reservePrice    
        from Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        WHERE buyerid = $userid and b.win = 'Yes' and a.isFinished = 1
        GROUP BY a.auctionid";

        $sold = "SELECT a.auctionid, photo, title, category, cndtn, colour, desc1, endDate, MAX(bidValue) as maxBid, startPrice, reservePrice    
        from Auction a
        LEFT JOIN Bids b ON b.auctionid = a.auctionid
        LEFT JOIN Items i ON a.itemid = i.itemid
        WHERE sellerid = $userid and b.win = 'Yes' and a.isFinished = 1
        GROUP BY a.auctionid";

        // <!-- -- for RECOMMENDATION section -->
        $recommended = "SELECT DISTINCT a.auctionid, photo, title, category, cndtn, colour, desc1, endDate, MAX(bidValue) as maxBid, startPrice, reservePrice
                        FROM Bids b
                        JOIN Auction a on b.auctionid = a.auctionid
                        JOIN Items i on i.itemid = a.itemid
                        WHERE a.isFinished = 0 and a.auctionid not in (SELECT DISTINCT b.auctionid FROM Bids b WHERE b.buyerid = $userid)
                        and a.auctionid not in (SELECT auctionid FROM Auction WHERE sellerid = $userid)
                        and a.auctionid not in (SELECT auctionid FROM Watch WHERE userid = $userid)
                        and b.buyerid in (SELECT DISTINCT b.buyerid 
                                                FROM Auction a
                                                JOIN Bids b on a.auctionid = b. auctionid
                                                WHERE b.buyerid != $userid and a.auctionid in (SELECT DISTINCT b.auctionid 
                                                                                                FROM Bids b 
                                                                                                WHERE b.buyerid = $userid))
                        GROUP BY a.auctionid";

        $exampleQuery = "YOUR SQL QUERY GOES HERE";
    
        $queries = array(
            "selling" => $selling,
            "bidding" => $bidding,
            "bought" => $bought,
            "sold" => $sold,
            "watching" => $watching,
            "recommended" => $recommended,
        );
        return $queries;
    }
?>




