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