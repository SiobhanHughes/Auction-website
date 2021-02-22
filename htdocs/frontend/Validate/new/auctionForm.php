<link rel="stylesheet" type="text/css" href="../../css/style/style.css" title="style" />
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/header.php');?>
    <div id="site_content">
        <h1>Create New Auction</h1>
        <div id="input">
            <?php if (isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>
            <form enctype="multipart/form-data" method="post" action="../../../src/Validate/auction.php">
                <div>
                    <h4>Title</h4>
                    <input type="text" name="title" maxlength="200" placeholder="Enter the title of this auction" required/>
                </div>
                <div>
                    <h4>Category</h4>
                    <select name="category">
                        <option value="other" selected>Other</option>
                        <option value="clothes">Clothes</option>
                        <option value="wands">Wands</option>
                        <option value="sporting-goods">Sporting Goods</option>
                        <option value="books">Books</option>
                        <option value="potions">Potions</option>
                    </select>
                </div>
                <br>
                <div>
                    <h4>Condition</h4>
                    <select name="condition">
                    <option value="new">New</option>
                    <option value="used">Used</option>
                    </select>
                </div>
                <br>
                <div>
                    <h4>Description</h4>
                    <textarea name="description" cols="30" rows="5" maxlength="5000" placeholder="Give a brief description about your item"></textarea>
                </div>
                <br>
                <div>
                    <h4>Colour</h4>
                    <input type="text" name="colour" placeholder="What are the main colours of this item?" required/>
                </div>
                <div>
                    <h4>Starting Price</h4>
                    <input type ="number" min="0.00" step="0.01" name="start-price" placeholder="Starting price" required/>
                </div>
                <br>
                <div>
                    <h4>Reserve Price</h4>
                    <input type ="number" min="0.00" step="0.01" name="reserve-price" placeholder="Reserve price" required/>
                </div>
                <br>
                <div>
                    <h4>Ending Date</h4>
                    <input type="date" name="end-date" min=<?php echo date('Y-m-d'); ?>>
                </div>
                <br>
                <div>
                    <h4>Upload an Image</h4>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5120000"/>
                    Selected Image: <input name="userfile" type="file" required/>
                </div>
                <input id="show-btn" type="submit" name="submit" value="Create Auction"/>
            </form>
        </div>
    </div>
<?php include ($_SERVER["DOCUMENT_ROOT"] . '/frontend/templates/footer.php');?>
