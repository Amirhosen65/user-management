<?php

include('./config/db.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('./src/PHPMailer.php');
include('./src/SMTP.php');
include('./src/Exception.php');

if(isset($_POST['mail_send_btn'])){

    $name = $_POST['name'];
    $user_mail = $_POST['email'];
    $user_subject = $_POST['subject'];
    $user_message = $_POST['message'];
    $current_datetime = date('Y-m-d H:i:s');

    $admin_subject = "Thank you for reaching out - Confirmation of Message Received";
    $admin_mail_body = "
Dear $name,<br>
Thank you for reaching out and showing interest in my work. I'm thrilled to inform you that I've received your message, and I appreciate the time you've taken to get in touch.<br><br>

I will review your message and respond as soon as possible. Please allow me a little time to get back to you, considering the nature of your inquiry.<br><br>

If you have any additional information to share or have more queries, feel free to respond to this email.<br><br>

Best regards,<br><br>

AJ Amir Hossain <br><br>
Web Dreams by AJ Amir <br>
Visit: https://ajamir.knowme.sbs <br>
Mail: contact@ajamir.x10.mx <br>
Phone: +8801787-944065
";

if($name && $user_mail && $user_subject && $user_message){

    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'amirhosen669222@gmail.com';                     //SMTP username
    $mail->Password   = 'dfkegpwrkivzbalb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('amirhosen669222@gmail.com', 'Web Dreams by AJ Amir');
    $mail->addAddress("$user_mail");     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('contact@ajamir.x10.mx');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$admin_subject";
    $mail->Body    = "$admin_mail_body";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    $insert_message = "INSERT INTO messages (name, subject, email, message, created_at) 
    VALUES ('$name', '$user_subject', '$user_mail', '$user_message', '$current_datetime')";
        mysqli_query($db_connect,$insert_message);

        $_SESSION['mail_sent'] = "Your message has been sent successfully. Thank you!";
        header('location: index.php');
    }else{
        $_SESSION['mail_sent_err'] = "Please enter required information correctly!";
        header('location: index.php');
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM messages WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['message_delete'] = "Counter deleted successfull!";
    header('location: ./dashboard/mailbox.php');    
}


?>

