<?php 
include_once 'database.php';
include 'generateItems.php';
session_start();

function isLoggedIn() {
    if (isset($_SESSION['username'])) {
        return true;
    } 
    return false;
}

if (isset($_POST['submit'])) {
    $main = "SELECT i.photo, i.title, i.category, i.cndtn, i.colour, i.desc1, a.endDate, MAX(b.bidValue) as maxBid, a.startPrice, a.reservePrice, a.auctionid
            FROM Auction a
            LEFT JOIN Bids b ON b.auctionid = a.auctionid
            LEFT JOIN Items i ON a.itemid = i.itemid
            WHERE a.isFinished = 0" ;
    
    $category = ($_POST['category'] != "all") ? " AND i.category=" . "'" . $_POST['category'] . "'" : ''; #default category is ALL - nothing needed in WHERE clause
    
    $search_query = " AND (i.title LIKE " . "'" . "%" . $_POST['search'] . "%" . "'" . 
                    " OR i.desc1 LIKE " . "'" .  "%" . $_POST['search'] . "%" . "'" . 
                    " OR i.colour LIKE " . "'" .  "%" . $_POST['search'] . "%" . "'" . ")";

    $word_search = ($_POST['search'] != "") ? $search_query : ''; #default is that search box is empty - nothing needed in WHERE clause
    $groupby = ' GROUP BY a.auctionid';
    $date = $_POST['date'] == 'n-o' ? ' a.endDate DESC' : ' a.endDate ASC';
    $price = $_POST['price'] == 'l-h' ? ' maxBid ASC' : ' maxBid DESC';

    if ($_POST['date'] == 'none' && $_POST['price'] == 'none') {
        $orderby = '';
    } elseif ($_POST['date'] == 'none') {
        $orderby = ' ORDER BY' . $price;
    } elseif ($_POST['price'] == 'none') {
        $orderby = ' ORDER BY' . $date;
    } else {
        $orderby = ' ORDER BY' . $date . ',' . $price;
    }
    
    
    if (isLoggedIn()) {
        $subquery = " AND a.auctionid not in (SELECT auctionid FROM Auction WHERE sellerid = $_SESSION[userid])
                    AND a.auctionid not in (SELECT auctionid FROM Watch WHERE userid = $_SESSION[userid]);
    }
    else {
        $subquery = ' ';
    
    }
    
    $query = $main . $category . $word_search . $subquery . $groupby . $orderby;
    header("Location: ../frontend/Validate/new/home.php?query=" . urlencode($query));
    exit();

}

?>