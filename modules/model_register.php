<?php

$database_host = 'localhost';
$database_user = 'root';
$database_password = '';
$database_name = 'padel';

$con = mysql_connect($database_host, $database_user, $database_password) or exit(mysql_error());
mysql_select_db($database_name, $con) or exit(mysql_error());

function db_query($sql) {
    return mysql_query($sql, $GLOBALS['con']);
}
?>

