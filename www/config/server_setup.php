<?php

require_once "database.php";
$ini = include('config.php');
            $DB_DSN = "mysql:dbname=" . $ini['db']['dbname'] . ";host=" . $ini['db']['host'] . ";port=" . $ini['db']['port'] . ";charset=UTF8";
            $DB_USER = $ini['db']['username'];
            $DB_PASSWORD = $ini['db']['password'];
            $DB_OPTS = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
];
                try {
                $pdo = new PDO("mysql:host=" . $ini['db']['host'] . ";charset=UTF8", $DB_USER, $DB_PASSWORD);
                $pdo->exec("CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8 COLLATE utf8_general_ci");
                echo "Database created successfully\n";
                } catch (PDOException $e) {
                echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
             exit(-1);
        }
          
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
