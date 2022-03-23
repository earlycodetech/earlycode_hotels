<?php 

    if (isset($_POST['send'])) {
        $to = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // The word wraap function helps to wrap our message when it is being sent, it takes 3 paramaters
        // 1) Message 2)Length of the words before break 3) The string break values which are written in quotation marks
        // (\r) means break on the right (\n) means go to a new line
        // $message = wordwrap($message,150,"\r\n");
        $message = "
        <html>
            <div style=\"background-color: #FBD6D2; margin: 0 auto; width: 300px; box-shadow: 5px 5px 60px 10px #FBD6D2; padding: 10px;\">
                <img src=\"http://earlycode-hotels.andakshipping.com/logo.png\"  style=\"display: block; margin: 0 auto; width: 200px;\">

                <h1 style=\"text-align: center; padding: 20px 0;\">Welcome to the Future</h1>
                <h6 style=\"text-align: center; padding: 20px 0;\">$message</h6>
            </div>
        </html>
        
        ";
        // $headers = "From: support@earlycode-hotels.com";
        $headers = "From: Earlycode-Hotels <support@earlycode-hotels.com>";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset= ISO-8859-1\r\n";

        $send = mail($to,$subject,$message,$headers);
        if ($send) {
            echo "<h1>Mail was sent succcessfuly</h1>";
        }else{
            echo "<h1>Mail was not sent</h1>";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="email" name="email" placeholder="Recipient Email" id=""> <br>
        <input type="text" name="subject" placeholder="subject" id=""><br>

        <textarea name="message" width="500" height="500"></textarea> <br>

        <input type="submit" name="send" value="Send">

    </form>

   
</body>
</html>