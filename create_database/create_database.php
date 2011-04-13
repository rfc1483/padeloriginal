<?php

$db_name = 'padel';
// Select the database.
$db_selected = mysql_select_db($db_name, $link);
// If the database exists drop it
if ($db_selected == true) {
    $sql = "DROP DATABASE $db_name";
    if (mysql_query($sql, $link)) {
        echo "Database $db_name was succesfully dropped <br />";
    } else {
        echo 'Error dropping database: ' . mysql_error() . "<br />";
    }
}

// Create database.
$sql = "CREATE DATABASE $db_name";
if (mysql_query($sql, $link)) {
    echo "Database $db_name created succesfully <br />";
} else {
    echo "Error creating database: " . mysql_error() . "<br />";
}

$db_selected = mysql_select_db($db_name, $link);
?>