<?php
// DB credentials.
// mysql://er322xgfar0w1ohi:xyqq68ih8lzqeglz@x8autxobia7sgh74.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/hxctwyzi7lcyf3kp
define('DB_HOST', 'x8autxobia7sgh74.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DB_USER', 'er322xgfar0w1ohi');
define('DB_PASS', 'xyqq68ih8lzqeglz');
define('DB_NAME', 'hxctwyzi7lcyf3kp');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>