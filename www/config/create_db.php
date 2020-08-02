<?php
$DB_HOST ='mysql';
$DB_NAME ='matcha_db';
$DB_USER ='root';
$DB_PASSWORD ='secret';
$DB_CHARSET ='utf8';
$DB_DNS_L = "mysql:host=$DB_HOST;charset=$DB_CHARSET";
//$DB_DNS = "mysql:host=$DB_HOST;charset=$DB_CHARSET;dbname=".$DB_NAME;
$DB_OPTS = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
// CREATE DATABASE
    try {
        $pdo = new PDO($DB_DNS_L, $DB_USER, $DB_PASSWORD, $DB_OPTS);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8 COLLATE utf8_general_ci");
        
        echo "Database created successfully\n";
        } catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
?>
