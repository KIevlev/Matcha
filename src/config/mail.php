<?php

function send_mail($email, $msg)
{
    $subject = "Matcha's calling!";
    $msg = wordwrap($msg, 70, "\r\n");
    // send email
    //mail($email,$subject,$msg);
//    $headers = 'MIME-Version: 1.0' . "\r\n";
//    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//    $headers .= 'From: no-reply@match-a.club' . "\r\n" .
//        'Reply-To: Kika.Ievlev@yandex.ru' . "\r\n" .
//        "X-Mailer: PHP/" . phpversion();
    if (!empty($_POST)) {
        if (!mail($email, $subject, $msg)) {
            return (0);
        } else
            return (1);
    }
    return (0);
}
