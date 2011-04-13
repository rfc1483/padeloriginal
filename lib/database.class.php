<?php

/* mysql hostname */
$hostname = 'localhost';

/* mysql username */
$username = 'root';

/* mysql password */
$password = '';

/* mysql dbname */
$dbname = 'padel';


try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*     * * echo a message saying we have connected ** */
    echo 'Connected to database';
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>