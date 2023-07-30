<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("./constants.php");

function sendmail($npn_name, $gender, $npn_phone, $town, $profession)
{
    require_once './PHPMailer/PHPMailer.php';
    require_once './PHPMailer/SMTP.php';
    require_once './PHPMailer/Exception.php';
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'your_smtp_host_here'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email_id_here'; // Replace with your email address
        $mail->Password = 'your_email_password_here'; // Replace with your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        //Recipients
        $mail->setFrom('your_email_id_here', $npn_name); // Replace with your email address
        $mail->addAddress("your_destination_email_here", APP_NAME); // Replace with the destination email

        //Content
        $mail->isHTML(true);
        $mail->Subject = $profession;
        $mail->Body = 'Name: '. $npn_name .'<br> Profession: ' . $profession .'<br> Phone: ' . $npn_phone . '<br>Town: '. $town.'<br> Gender: ' . $gender;

        $mail->send();
        echo "<script>
        alert('Thank you for signing up. We\'re excited to have you on board!');
        window.location.href = '../index.html';
     </script>";

    } catch (Exception $e) {
        echo "<script>
        alert('There was an error: " . $e->getMessage() . "');
        window.location.href = '../index.html';
     </script>";

    }

}
