INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('Chanel Necklace','Jewelry','New','photo1','Red','brand new fabulous necklace');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('Burberry Scarf','Accessories','New','photo2','Pink','brand new fabulous scarf');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('LV backpack','Bag','Old','photo3','Brown','old killing LV backpack');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('SW boots','Shoes','New','photo4','Black','brand new YM-wearing boots');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('Gucci belt','Accessories','Old','photo5','Black','worn Gucci belt');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('Gucci Bag','Bag','Old','photo6','White','worn Gucci bag');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('Acne Studio hat','Accessories','New','photo7','Green','super cute acne studio hat');
INSERT INTO Items(title,category,cndtn,photo,colour,desc1)
VALUES('YSL eyeliner','Bag','Old','photo8','black','how stupid you are to buy old eyeliner');


INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(1,1,'19-10-29','19-11-20',0,330,250);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(1,2,'19-10-29','19-11-12',0,20,14);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(2,3,'19-08-29','19-11-13',0,200,140);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(2,4,'19-09-29','19-11-15',0,204,143);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(3,5,'19-10-29','19-11-20',0,330,250);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(3,6,'19-10-29','19-11-12',0,20,14);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(4,7,'19-08-29','19-11-13',0,200,140);
INSERT INTO Auction(sellerid,itemid,startDate,endDate,isFinished,startPrice,reservePrice)
VALUES(4,8,'19-09-29','19-11-15',0,204,143);


INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(1,1,245);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(2,1,22);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(3,2,120);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(4,2,155);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(5,3,245);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(6,3,22);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(7,4,120);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(8,4,155);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(1,5,245);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(2,5,22);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(3,6,120);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(4,6,155);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(5,4,245);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(6,4,22);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(7,3,120);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(8,3,155);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(7,1,120);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(8,1,155);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(5,2,245);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(8,2,155);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(6,5,245);
INSERT INTO Bids(auctionid,buyerid,bidValue)
VALUES(7,6,155);



