<?php
return array(
    #Database Settings
    "db" => array(
        'host' => 'h006357876.mysql',
        'port' => '3306',
        'dbname' => 'h006357876_db',
        'username' => 'h006357876_mysql',
        'password' => 'yKTTw+w2'),
    #Php Mailer Settings
    "mail" => array(
        'Username' => 'Kika.Ievlev@yandex.ru',
        'Password' => 'spartakievlev17',
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
        'clientSecret' => 'Zn8sQd0bi98preBOSUNuaLg5',
        'redirectUri' => 'https://match-a.club/'
    )
);
?>