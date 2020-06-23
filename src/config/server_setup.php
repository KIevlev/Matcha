<?php

require_once "database.php";

$db = new database();

try {
    $db->db_read('SELECT 1 FROM `CHATS`');
} catch (\PDOException $e) {
    $dumps = scandir("./database_dump");
    $dumps_count = count($dumps) - 2;
    $i = 0;
    print("Find $dumps_count dumps, importing..." . PHP_EOL);
    foreach ($dumps as $dump){
        if($dump != '.' && $dump != '..') {
            $db->db_import($dump);
            $i += 1;
            print("$dump - Imported! ($i/$dumps_count)" . PHP_EOL);
        }
    }
    exec("mkdir ../images/user_photo");
}
