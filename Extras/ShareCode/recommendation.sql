-- userid -> bids -> for each auction, look for other bidders 
-- -> for each bidder, randomly select some bids they are in 
-- -> find the corresponding item row -> display it
-- b.buyerid = $SESSION

SELECT DISTINCT i.itemid, i.title, i.category
FROM Bids b
JOIN Auction a on b.auctionid = a.auctionid
JOIN Items i on i.itemid = a.itemid
WHERE a.isFinished = 0 and a.auctionid not in (SELECT DISTINCT b.auctionid FROM Bids b WHERE b.buyerid = 2) 
and b.buyerid in (SELECT DISTINCT b.buyerid 
                  FROM Auction a
                  JOIN Bids b on a.auctionid = b.auctionid
                  WHERE b.buyerid != 2 and a.auctionid in (SELECT DISTINCT b.auctionid 
                  										   FROM Bids b 
                 										   WHERE b.buyerid = 2))