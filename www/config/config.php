<?php
return array(
    #Database Settings
    "db" => array(
        'host' => 'mysql',
        'port' => '3306',
        'dbname' => 'matcha_db',
        'username' => 'root',
        'password' => 'secret'),
    #Php Mailer Settings
    "mail" => array(
        'Username' => 'you@yandex.ru',
        'Password' => '',
        'Subject' => "Letter Subject",
        'Host' => 'Mail Host',
        'Port' => 587,
        'Address' => 'Email',
        'Name' => 'Letter Name'),
    #City Parser Settings
    "city_parser" => array(
        "token" => "5f26194ef0a73133ec8688e3c02cc37b83d553b5"
    ),
    #Notification web socket server (Host Address)
 	"ip_ws" => '195.24.68.15', //ws:
    #Google Auth API
    "google"=>array(
        'clientID' =>'60706608674-mati91un5n34ihhoq2d2uomem0r4j2d4.apps.googleusercontent.com',  //AIzaSyBMDYwsNCPBkHwR72b9sPrd2MOaBYgn7hM
        'clientSecret' => '',
        'redirectUri' => 'https://match-a.club/'
    )
);
?>
