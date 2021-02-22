<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
    <div id="site_content">
        <h1>Goodbye! See you again soon!</h1>
        <div id="input">
            <?php if (isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>
            <div>
                <form method="post" action="../../../src/Validate/logout.php">
                    <input id="show-btn" type="submit" name="submit" value="Logout"/>
                <form>
            </div>
        </div>
    </div>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>