<?php
    include 'dbcon.php';
    include '../includes/sessions.php';

    if (isset($_POST['sendT'])) {
        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($connectDB,$sql);
        $exist = mysqli_num_rows($query);
        // This checks if a row is found
        if ($exist < 1) {
            $_SESSION['errorMessage'] = "This email does not exist";
            header("Location: ../../forgot");
        }else{
            $token = rand(10000000,99999999);
            $sql = "UPDATE users SET password_reset = '$token' WHERE email = '$email'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $link = "http://earlycode-hotels.andakshipping.com/forgot?t=$token";
                $to = $email;
                $subject = "Password Reset";
        
                // The word wraap function helps to wrap our message when it is being sent, it takes 3 paramaters
                // 1) Message 2)Length of the words before break 3) The string break values which are written in quotation marks
                // (\r) means break on the right (\n) means go to a new line
                // $message = wordwrap($message,150,"\r\n");
                $message = "
                <html>
                    <div style=\"background-color: #FBD6D2; margin: 0 auto; width: 900px; box-shadow: 5px 5px 60px 10px #FBD6D2; padding: 10px;\">
                        <img src=\"http://earlycode-hotels.andakshipping.com/assets/img/logo.png\"  style=\"display: block; margin: 0 auto; width: 200px;\">
        
                        <h1 style=\"text-align: center; padding: 20px 0;\">Click the Button Below to reset your password</h1>
                        <h6 style=\"text-align: center; padding: 20px 0;\">Please note that this button is only valid for one reset option</h6>
                        <div style=\"text-align:center; margin: 20px 0;\">
                            <a href=\"$link\" style=\"border: 1px solid; border-radius: 15px; padding: 5px 20px; text-decoration: none; background-color: #46244C; color: #ffffff;\">Reset Password</a>
                        </div>
                    </div>
                </html>
                
                ";
                // $headers = "From: support@earlycode-hotels.com";
                $headers = "From: Earlycode-Hotels <support@earlycode-hotels.com>";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset= ISO-8859-1\r\n";
        
                $send = mail($to,$subject,$message,$headers);
                if ($send) {
                    $_SESSION['successMessage'] = "Reset email was sent successfully";
                    header("Location: ../../forgot");
                }else{
                    $_SESSION['errorMessage'] = "Reset Failed";
                    header("Location: ../../forgot");
                }
            }
        }
    }
    elseif (isset($_POST['resetPass'])) {

        $id = $_POST['id'];
        $newPassword = $_POST['pass'];
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET user_password = '$newPassword', password_reset = 'SET' WHERE id ='$id'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
            $_SESSION['successMessage'] = "Password reset successfull, please login..";
            header("Location: ../../authentication");
        }else{
            $_SESSION['errorMessage'] = "Reset Failed";
            header("Location: ../../authentication");
        }
    }


    // Main ELSE STATEMENT
    else{
        $_SESSION['errorMessage'] = "Please Register an Account";
        header("Location: ../../authentication");
    }