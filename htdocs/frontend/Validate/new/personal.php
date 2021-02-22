<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/src/generateItems.php'); ?>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/src/generateItemsBidding.php'); ?>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/src/personalSQL.php'); ?>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/src/generatePersonal.php'); ?>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/src/generatePersonalBidding.php'); ?>

<?php $queries = getQueries($_SESSION['userid']); ?>
<div id="site_content">
    <div id="content">
        <h1>Personal Page</h1>
        <div>
            <h2>Items you're bidding on</h2>
            <hr>
            <br>
            <div id="table">
                <?php
                    echo generatePersonalBidding($queries['bidding'], true, false, $connection);
                ?>
            </div>
            <h2>Items you're selling</h2>
            <hr>
            <br>
            <div id="table">
                <?php
                    echo generatePersonal($queries['selling'], false, false, $connection);
                ?>
            </div>
            <h2>Items you're watching</h2>
            <hr>
            <br>
            <div id="table">
                <?php
                    echo generatePersonal($queries['watching'], true, false, $connection);
                ?>
            </div>
            <h2>Auctions you won</h2>
            <hr>
            <br>
            <div id="table">
                <?php
                    echo generatePersonal($queries['bought'], false, false, $connection);
                ?>
            </div>
            <h2>Items you sold</h2>
            <hr>
            <br>
            <div id="table">
                <?php
                    echo generatePersonal($queries['sold'], false, false, $connection);
                ?>
            </div>
            <h2>Recommended Items</h2>
            <hr>
            <br>
            <div id="table">
                <?php
                    echo generatePersonal($queries['recommended'], true, true, $connection);
                ?>
            </div>
        </div>
        <div id="table">
        </div>
    </div>
</div>
<?php mysqli_close($connection); ?>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>
