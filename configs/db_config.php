<?php
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'adaPortfolio';
$db_pass = getenv('DB_PASS') ?: 'adaPortfolio';
$db_name = getenv('DB_NAME') ?: 'adaPortfolio';
$db_port = getenv('DB_PORT') ?: '3306';
$db_charset = 'utf8mb4';

$db = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}
$db->set_charset($db_charset);
