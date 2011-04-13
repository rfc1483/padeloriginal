<?php

$db_server = 'localhost';
$db_user = 'root';

$link = mysql_connect($db_server, $db_user);
if (!$link) {
    die('Could not connect' . mysql_error());
}
echo "Connected successfully <br />";
?>