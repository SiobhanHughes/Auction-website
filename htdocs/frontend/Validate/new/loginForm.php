<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
    <div id="site_content">
        <h1>Login</h1>
        <div id="input">
            <?php if (isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>
            <form method="post" action="../../../src/Validate/login.php">
                <input type="text" id="username" name="username" placeholder="Enter Your Username"/>
                <input type="password" id="password" name="password" placeholder="Enter Your Password"/>
                <input id="show-btn" type="submit" name="submit" value="Login"/>
            </form>
        </div>
    </div>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>
