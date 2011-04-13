<?php

$table_name = 'team';

$sql = "
    CREATE TABLE $table_name(
    id INT NOT NULL AUTO_INCREMENT,
    name1 VARCHAR(30),
    surname1 VARCHAR(30),
    name2 VARCHAR(30),
    surname2 VARCHAR(30),
    user_name VARCHAR(30),
    password VARCHAR(40),
    phone1 VARCHAR(30),
    phone2 VARCHAR(30),
    email1 VARCHAR(30),
    email2 VARCHAR(30),    
    PRIMARY KEY(id)
    )
";

$result = mysql_query($sql);

if ($result == true) {
    echo "Table $table_name created <br />";
} else {
    echo "Unnable to create table $table_name: " . mysql_error();
}
?>