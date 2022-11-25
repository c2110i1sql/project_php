<?php
require 'mail/PHPMailerAutoload.php';
function mailContact($email, $name, $subject, $body)
{
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'c2110i1sql@gmail.com';                 // SMTP username
    $mail->Password = 'xczrnqrehgimoegf';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    $mail->WordWrap = 50; 
    $mail->isHTML(true);     
    $mail->From = 'c2110i1sql@gmail.com';
    $mail->FromName = 'Test email PHP';
    $mail->addAddress($email, $name);     // Add a recipient
    // $mail->addAddress('laihuubach08@gmail.com', 'Lại Hữu Bách');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

                                // Set word wrap to 50 characters
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                    // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    } else {
       return true;
    }
}