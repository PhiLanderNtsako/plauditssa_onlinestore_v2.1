<?php
	session_start();
    include 'inc/config.php';
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'libs/phpmailer/vendor/autoload.php';
    require 'libs/fpdf/vendor/autoload.php';

    if(isset($_POST['submit_subscribe'])){        

        $subscriber_email = mysqli_real_escape_string($conn,$_POST['subscriber_email']);

        $user_check_query = "SELECT * FROM subscriber WHERE subscriber_email = '$subscriber_email' ";
        $result = mysqli_query($conn, $user_check_query) or die(mysqli_error($conn));
        $rows_fetched=mysqli_num_rows($result);

        if($rows_fetched >0 ){
            echo'<script>alert("You Are Already Subscribed.")</script>';
            echo '<meta http-equiv="refresh" content="0; url= index.php">';
     
        }else{

            $query = "INSERT INTO subscriber (subscriber_email)
                        VALUES ('$subscriber_email')"; 
            mysqli_query($conn, $query);
            mysqli_close($conn);
                
            $mail = new PHPMailer(true);
            $mail->From = 'info@plauditssa.co.za';
            // $mail->FromName = $row_admin['admin_name'];
            $mail->AddAddress($subscriber_email);
            $mail->isHTML(true);
    
            $mail->Subject = 'Plaudits SA - Subscription for newsletters';
            $mail->Body = '<h2>Congratulations. You have successfully joined our newsletters mail list</h2>';
    
            // $mail->addAttachment($filename);
    
            try {
                $mail->send();
                echo "Report has been sent successfully";
            } catch(Exception $e){
                echo "Mailer Error: ".$mail->ErrorInfo;
            }

            $message = "Thank You for Subscribing.";
            echo "<script type='text/javascript'>alert('$message')</script>";
            echo '<meta http-equiv="refresh" content="0; url= index.php">';
        }
    }
 ?>