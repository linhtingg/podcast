<?php
// DB credentials.
// mysql://xwvaujqd2margx0l:g8g9b2txmbnkcjq8@x8autxobia7sgh74.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/gv5y3jxt97zjdyxj;
define('DB_HOST', 'x8autxobia7sgh74.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DB_USER', 'xwvaujqd2margx0l');
define('DB_PASS', 'g8g9b2txmbnkcjq8');
define('DB_NAME', 'gv5y3jxt97zjdyxj');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>