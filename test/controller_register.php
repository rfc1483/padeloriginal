<?php

require('model_register.php');
$page_mode = isset($_POST['page_mode']) ? $_POST['page_mode'] : '';

if ($page_mode == 'register') {
    $name1 = trim($_POST['name1']); // trim to remove whitespace
    $surname1 = trim($_POST['surname1']);
    $phone1 = trim($_POST['phone1']);
    $email1 = trim($_POST['email1']);
    $name2 = trim($_POST['name2']);
    $surname2 = trim($_POST['surname2']);
    $phone2 = trim($_POST['phone2']);
    $email2 = trim($_POST['email2']);
    $user_name = trim($_POST['user_name']);
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

//    $result = db_query("SELECT id FROM team WHERE email1='" . mysql_real_escape_string($email1) . "'");
//    $result2 = db_query("SELECT id FROM team WHERE email2='" . mysql_real_escape_string($email2) . "'");
//    if (mysql_num_rows($result) > 0)
//        echo 'La direccion de e-mail ya esta registrada.<br>';
//    else {
    $name1 = mysql_real_escape_string($name1);
    $surname1 = mysql_real_escape_string($surname1);
    $phone1 = mysql_real_escape_string($phone1);
    $email1 = mysql_real_escape_string($email1);
    $name2 = mysql_real_escape_string($name2);
    $surname2 = mysql_real_escape_string($surname2);
    $phone2 = mysql_real_escape_string($phone2);
    $email2 = mysql_real_escape_string($email2);
    $user_name = mysql_real_escape_string($user_name);
    $password = sha1($password); // hash password
//    echo "clave -> " . $password . "hash -> " . sha1($password);
//    query("INSERT INTO team (name1, surname1, phone1, email1, 
//                name2, surname2, phone2, email2, user_name, password) 
//                VALUES ('$name1', '$surname1', '$phone1', '$email1',
//                '$name2', '$surname2', '$phone2', '$email2', '$user_name', '$password')");

    /*     * * INSERT data ** */
    $count = $dbh->exec("INSERT INTO team 
            (
            name1, 
            surname1, 
            phone1, 
            email1, 
            name2, 
            surname2, 
            phone2, 
            email2, 
            user_name, 
            password
            ) 
            VALUES 
            (
            '$name1', 
            '$surname1', 
            '$phone1', 
            '$email1',
            '$name2', 
            '$surname2', 
            '$phone2', 
            '$email2', 
            '$user_name', 
            '$password'
            )"
    );

    /*     * * echo the number of affected rows ** */
    echo $count;
    header('Location: thankyou_register.php');
    $db->disconnect();
//    }
}

function isValidEmail($email = '') {
    return preg_match("/^[\d\w\/+!=#|$?%{^&}*`'~-][\d\w\/\.+!=#|$?%{^&}*`'~-]*@[A-Z0-9][A-Z0-9.-]{1,61}[A-Z0-9]\.[A-Z]{2,6}$/ix", $email);
}

require('view_register.php');
?>
