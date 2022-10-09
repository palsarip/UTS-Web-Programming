<?php
    // db.php
    // DB Credentials
    define('DSN', 'mysql:host=localhost;dbname=uts');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    // 1. Connect to DB
    $db = new PDO(DSN, DB_USER, DB_PASS);
?>