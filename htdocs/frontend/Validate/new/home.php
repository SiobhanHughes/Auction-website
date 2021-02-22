<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/src/generateItems.php'); ?>
<?php include '../../../src/database.php'; ?>
<div id="site_content">
    <div id="content">
        <?php $user = isLoggedIn() ? ', ' . $_SESSION['username'] : ''; ?>
        <h1>Welcome to our Auction Site<?php echo $user; ?></h1>

            <form style="" method="post" action="../../../src/search_options.php">
                <div style="float:left;">
                    <h4>Search</h4>
                    <input type="text" name="search" placeholder="Search for something!">
                    <br>
                </div>
                <div style="float:left;">
                    <h4>Category</h4>
                    <select name="category">
                        <option value="all" selected>All</option>
                        <option value="clothes">Clothes</option>
                        <option value="wands">Wands</option>
                        <option value="sporting-goods">Sporting Goods</option>
                        <option value="books">Books</option>
                        <option value="potions">Potions</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div style="float:left;">
                    <h4>Price</h4>
                    <select name="price">
                        <option value="none" selected>None</option>
                        <option value="l-h">Lowest to Highest</option>
                        <option value="h-l">Highest to Lowest</option>
                    </select>
                </div>
                <div style="float:left;">
                    <h4>Date</h4>
                    <select name="date">
                        <option value="none" selected>None</option>
                        <option value="n-o">Ending Last</option>
                        <option value="o-n">Ending Soonest</option>
                    </select>
                </div>
                <br>
                <br>
                <br>
                <input type="submit" name="submit" value="Go"/>
            </form>
        <br>

        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>

        <div id="table">
            <?php
                $main = "SELECT i.photo, i.title, i.category, i.cndtn, i.colour, i.desc1, a.endDate, MAX(b.bidValue) as maxBid, a.startPrice, a.reservePrice, a.auctionid
                        FROM Auction a
                        LEFT JOIN Bids b ON b.auctionid = a.auctionid
                        LEFT JOIN Items i ON a.itemid = i.itemid
                        WHERE a.isFinished = 0" ;
        
                $category = ' ';  #default category is ALL - nothing needed in WHERE clause
        
                $word_search = ' '; #default is that search box is empty - nothing needed in WHERE clause
        
                $groupby = ' GROUP BY a.auctionid';
                $orderby = ' '; #default is none for order by date and/or price

                if (isLoggedIn()) {
                $subquery = " AND a.auctionid not in (SELECT auctionid FROM Auction WHERE sellerid = $_SESSION[userid])
                            AND a.auctionid not in (SELECT auctionid FROM Watch WHERE userid = $_SESSION[userid])"; #user can not bid on items they are selling (not shown on Home). Items user is selling visible on Personal page.
                }
                else {
                    $subquery = ' ';
                
                }

                $query = $main . $category . $word_search . $subquery . $groupby . $orderby;

                if (isset($_GET['query'])) {
                    $query =  $_GET['query'];
                }

                $display =  mysqli_query($connection, $query)
                    or die('Error making select items query' . mysqli_error($connection));
                echo '<table>';
                if (isLoggedIn()) {
                    $showButtons = true;
                    $showWatch = true;
                } else {
                    $showButtons = false;
                    $showWatch = false;
                }
                while ($row = mysqli_fetch_array($display))
                {
                    echo generateItems($row, $showButtons, $showWatch);
                }
                echo '</table>';
                mysqli_close($connection);
                ?>
        </div>
    </div>
</div>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>
