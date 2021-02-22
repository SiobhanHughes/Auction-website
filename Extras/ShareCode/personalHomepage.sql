-- for AUCTION section 
SELECT sellerid, i.itemid, i.colour, i.desc1, a.isFinished, i.title, i.category, i.cndtn, i.photo, MAX(b.bidValue)
from Auction a
LEFT JOIN Bids b ON b.auctionid = a.auctionid
LEFT JOIN Items i ON a.itemid = i.itemid
WHERE sellerid = 1 and a.isFinished = 0 -- change to $_SESSION later on
GROUP BY a.auctionid

-- for BID section
SELECT buyerid, i.itemid, i.colour, i.desc1, i.title, i.category, i.cndtn, i.photo, MAX(b.bidValue)
from Auction a
LEFT JOIN Bids b ON b.auctionid = a.auctionid
LEFT JOIN Items i ON a.itemid = i.itemid
WHERE buyerid = 1 and b.win = 'No' and a.isFinished = 0-- change to $_SESSION later on
GROUP BY i.itemid

-- for items already bought
SELECT buyerid, i.itemid, i.colour, i.desc1, i.title, i.category, i.cndtn, i.photo, MAX(b.bidValue)
from Auction a
LEFT JOIN Bids b ON b.auctionid = a.auctionid
LEFT JOIN Items i ON a.itemid = i.itemid
WHERE buyerid = 2 and b.win = 'Yes' and a.isFinished = 1-- change to $_SESSION later on
GROUP BY i.itemid



