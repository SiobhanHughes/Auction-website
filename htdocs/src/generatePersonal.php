<?php
    include_once "database.php";
    function generatePersonal($query, $showButtons, $showWatch, $conn) {
        $display = mysqli_query($conn, $query)
        or die('Error making select users query' . mysqli_error($conn));
        $count = mysqli_num_rows($display);
        if ($count == 0) {
            echo "None";
        }
        echo '<table>';
        while ($row = mysqli_fetch_array($display))
        {
            echo generateItems($row, $showButtons, $showWatch);
        }
        echo '</table>';
    }
?>