CREATE DEFINER=`root`@`localhost` EVENT `Auction ends` ON SCHEDULE EVERY 1 DAY STARTS '2019-12-04 17:33:08' ON COMPLETION NOT PRESERVE ENABLE DO 
UPDATE Auction
SET isFinished = 1
WHERE Auction.endDate <= CURRENT_TIMESTAMP