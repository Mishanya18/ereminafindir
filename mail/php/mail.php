<?php
  require("/var/www/ereminaf/data/www/ereminafindir.ru/PHPMailer/src/Exception.php");
  require("/var/www/ereminaf/data/www/ereminafindir.ru/PHPMailer/src/PHPMailer.php");
  require("/var/www/ereminaf/data/www/ereminafindir.ru/PHPMailer/src/SMTP.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/php/config.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/php/valid.php');
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->CharSet = CHARSET;
    $mail->IsHTML(true);
    $mail->Username = "ereminafindirsite";
    $mail->Password = "ereminafindirsite1!";
    $mail->SetFrom("ereminafindirsite@gmail.com");
    $mail->Subject = SUBJECT;
	$mail->Body = "$name $tel $email";
    $mail->AddAddress("mirytov@gmail.com");

     if(!$mail->Send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        //echo "Message has been sent";
        echo json_encode($msgs);
     }
