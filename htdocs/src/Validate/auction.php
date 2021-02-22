<?php
    session_start();
    include_once '../database.php';
    include_once 'upload.php';
    if (isset($_POST['submit'])) {
        $imagePath = uploadImage();
        $seller_id = $_SESSION['userid'];
        $title = trim(mysqli_real_escape_string($connection, $_POST['title']));
        $category = trim(mysqli_real_escape_string($connection, $_POST['category']));
        $condition = trim(mysqli_real_escape_string($connection, $_POST['condition']));
        $photo = trim(mysqli_real_escape_string($connection, $_POST['photo']));
        $colour = trim(mysqli_real_escape_string($connection, $_POST['colour']));
        $desc = trim(mysqli_real_escape_string($connection, $_POST['description']));
        $start_date = trim(mysqli_real_escape_string($connection, date('Y-m-d')));
        $end_date = trim(mysqli_real_escape_string($connection, $_POST['end-date']));
        $start_price = trim(mysqli_real_escape_string($connection, $_POST['start-price']));
        $reserve_price = trim(mysqli_real_escape_string($connection, $_POST['reserve-price']));

        $insertItem = "INSERT INTO Items (title, category, cndtn, colour, desc1, photo)
                    VALUES ('$title', '$category', '$condition', '$colour', '$desc', '$imagePath')";
        
        if (mysqli_query($connection, $insertItem)) {
            $item_id = mysqli_insert_id($connection);
            $insertAuction = "INSERT INTO Auction (sellerid, itemid, startDate, endDate, startPrice, reservePrice)
                            VALUES ('$seller_id', '$item_id', '$start_date', '$end_date', '$start_price', '$reserve_price')";
        } else {
            die('Error inserting item into db ' . mysqli_error($connection));
        }
        if (!mysqli_query($connection, $insertAuction)) {
            die('Error inserting auction into db ' . mysqli_error($connection));
        } else {
            mysqli_close($connection);
            header("Location: ../../frontend/Validate/new/home.php");
            exit();
        }
    }
?>