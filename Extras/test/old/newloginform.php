<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
    <div id="site_content">
        <h1>Create an account</h1>
        <?php echo $_SERVER["DOCUMENT_ROOT"] ?>
        <div id="input">
            <?php if (isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>
            <form method="post" action="../../src/Validate/register.php">
                <input type="text" id="username" name="username" placeholder="Enter Your Username" required/>
                <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Your email" required/>
                <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="At least one lowercase letter, at least one uppercase letter, at least one number, min 8 characters" placeholder="Enter Your Password" required/>
                <input id="show-btn" type="submit" name="submit" value="Register"/>
            </form>
            <h5>Password must contain the following:</h5>
            <h6>A lowercase letter<h6>
            <h6>A capital (uppercase) letter<h6>
            <h6>A number<h6>
            <h6>Minimum 8 characters<h6>
        </div>
    </div>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>
