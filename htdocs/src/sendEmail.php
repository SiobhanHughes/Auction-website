    <?php
        function sendMail($to, $subject, $message) {
            ini_set( 'display_errors', 1 );
            // error_reporting( E_ALL );
            $from = "diagon@gmail.com";
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
            // echo "The email message was sent.";
        }
    ?>