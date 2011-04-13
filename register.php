<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="messages.js"></script>

<?php
require_once 'db.php';

$page_mode = isset($_POST['page_mode']) ? $_POST['page_mode'] : '';

if ($page_mode == 'register') {
    $name1 = trim($_POST['name1']); // trim to remove whitespace
    $surname1 = trim($_POST['surname1']);
    $phone1 = trim($_POST['phone1']);
    $email1 = trim($_POST['email1']);
    $name2 = trim($_POST['name2']); // trim to remove whitespace
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

    db_query("INSERT INTO team (name1, surname1, phone1, email1, 
                name2, surname2, phone2, email2, user_name, password) 
                VALUES ('$name1', '$surname1', '$phone1', '$email1',
                '$name2', '$surname2', '$phone2', '$email2', '$user_name', '$password')");
    header('Location: thankyou.php');
    exit();
//    }
}

function isValidEmail($email = '') {
    return preg_match("/^[\d\w\/+!=#|$?%{^&}*`'~-][\d\w\/\.+!=#|$?%{^&}*`'~-]*@[A-Z0-9][A-Z0-9.-]{1,61}[A-Z0-9]\.[A-Z]{2,6}$/ix", $email);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Registro</title>
    </head>
    <form name="form" id="form" class="form" action="register.php" onsubmit="return validate(this)" method="post">
        <fieldset>
            <legend>
                <span>Inscripcion</span>
            </legend>
            <input type="hidden" name="page_mode" value="register" />
            <div>
                <label for="name1">Nombre primer jugador</label>
                <input id="name1" name="name1" id="name1" type="text" />
            </div>
            <div>
                <label for="surname1">Apellido primer jugador</label>
                <input name="surname1" id="surname1" type="text" />
            </div>
            <div>
                <label for="telefono1">Telefono primer jugador</label>
                <input name="phone1" id="phone1" type="text" />
            </div>       
            <div>
                <label for="email1">E-mail primer jugador</label>
                <input name="email1" id="email1" type="text" />
            </div>   
            <div>
                <label for="name2">Nombre segundo jugador</label>
                <input name="name2" id="name2" type="text" />
            </div>        
            <div>
                <label for="surname2">Apellido segundo jugador</label>
                <input name="surname2" id="surname2" type="text" />
            </div>
            <div>
                <label for="telefono2">Telefono segundo jugador</label>
                <input name="phone2" id="phone2" type="text" />
            </div>                
            <div>
                <label for="email2">E-mail segundo jugador</label>
                <input name="email2" id="email2" type="text" />
            </div>   
            <div>
                <label for="user_name">Nombre de usuario</label>
                <input name="user_name" id="user_name" type="text" />
            </div>
            <div>
                <label for="password">Clave</label>
                <input name="password" id="password" type="password" />
            </div>
            <div>
                <label for="conf_password">Confirmar clave</label>
                <input name="conf_password" id="conf_password" type="password" />
            </div>
        </fieldset>
        <fieldset class="submit">
            <input name="submit" id="submit" value="Inscribirse" type="submit" class="button"/>
        </fieldset>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

