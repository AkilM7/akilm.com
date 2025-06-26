<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'akilmurugan2002@gmail.com'; // Your Gmail
        $mail->Password = 'tfcelbvrnfacxtfo'; // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email Settings
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('akilmurugan2002@gmail.com'); // Your receiving email
        $mail->Subject = $_POST['subject'];
        $mail->Body    = "Name: {$_POST['name']}\nEmail: {$_POST['email']}\n\nMessage:\n{$_POST['message']}";

        $mail->send();
    echo 'OK';

  } catch (Exception $e) {
    http_response_code(500);
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}
?>