<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mybookstore1429@gmail.com'; // your Gmail
        $mail->Password   = 'eslp oplf zaji jmmp';    // your Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('mybookstore1429@gmail.com');  // your inbox where email arrives

        // Content of the email
        $mail->isHTML(false);
        $mail->Subject = "New Contact Message from $name";
        $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='MYbook.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error: ". $mail->ErrorInfo ."'); history.back();</script>";
    }
}
?>
