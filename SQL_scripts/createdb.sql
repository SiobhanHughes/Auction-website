DROP DATABASE auction_site;

CREATE DATABASE auction_site
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

DROP USER 'auctionadmin'@'localhost';
FLUSH PRIVILEGES;
  
CREATE USER 'auctionadmin'@'localhost'
  IDENTIFIED BY 'adminpassword';

GRANT SELECT, UPDATE, INSERT, DELETE
    ON auction_site.*
    TO 'auctionadmin'@'localhost';

USE auction_site;

CREATE TABLE Users
(
  userid INTEGER AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  passwordhash VARCHAR(60)NOT NULL,
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  addressline1 VARCHAR(200),
  addressline2 VARCHAR(200),
  city VARCHAR(100),
  postcode VARCHAR(10),
  phone VARCHAR(50)
);

CREATE TABLE Items
(
  itemid INTEGER AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  category VARCHAR(50) NOT NULL,
  cndtn VARCHAR(20),
  photo VARCHAR(1000),
  colour VARCHAR(50),
  desc1 VARCHAR(5000)
);

CREATE TABLE Auction
(
  auctionid INTEGER AUTO_INCREMENT PRIMARY KEY,
  sellerid INTEGER,
  itemid INTEGER,
  startDate DATE NOT NULL,
  endDate DATE NOT NULL,
  isFinished bit NOT NULL DEFAULT 0,
  startPrice DECIMAL(18,2),
  reservePrice DECIMAL(18,2),
  FOREIGN KEY (sellerid) REFERENCES Users (userid),
  FOREIGN KEY (itemid) REFERENCES Items (itemid)
);

CREATE TABLE Bids
(
  auctionid INTEGER,
  buyerid INTEGER,
  bidValue DECIMAL(18,2) NOT NULL,
  win VARCHAR(10) DEFAULT 'No',
  PRIMARY KEY (auctionid, buyerid),
  FOREIGN KEY (auctionid) REFERENCES Auction (auctionid),
  FOREIGN KEY (buyerid) REFERENCES Users (userid)
);

CREATE TABLE Watch
(
  auctionid INTEGER,
  userid INTEGER,
  PRIMARY KEY (auctionid, userid),
  FOREIGN KEY (auctionid) REFERENCES Auction (auctionid),
  FOREIGN KEY (userid) REFERENCES Users (userid)
);