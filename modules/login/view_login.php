<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="messages.js"></script>

<?php
session_start();

require_once 'db.php';

$page_mode = isset($_POST['page_mode']) ? $_POST['page_mode'] : '';


$error_string = "";
if ($page_mode == 'login') {
    $password = $_POST['password'];
    $user_name = $_POST['user_name'];
    $result = db_query("SELECT * FROM team WHERE user_name='" . mysql_real_escape_string($user_name) . "'");
    if (!($row = mysql_fetch_assoc($result)))
        $error_string .= 'Nombre de usuario incorrecto.<br>';
    elseif ($row['password'] != sha1($password))
        $error_string .= "Clave incorrecta.<br>";
    else {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header('Location: index.php');
        exit();
    }
} else {
    $password = "";
    $user_name = "";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <div><?php echo $error_string; ?></div>
        <form name="form" id="form" class="form" action="login.php" onsubmit="return validateLogin(this)" method="post">
            <fieldset>
                <legend>
                    <span>Login</span>
                </legend>
                <input type="hidden" name="page_mode" value="login" />
                <div>
                    <label for="user_name">Usuario</label>
                    <input name="user_name" id="user_name" value="<?php echo $user_name ?>" type="text" />
                </div>
                <div>
                    <label for="clave">Clave</label>
                    <input name="password" id="password" value="<?php echo $password ?>" type="password" />
                </div>   
            </fieldset>
            <fieldset class="submit">
                <input name="submit" id="submit" value="Entrar" type="submit" class="button" />
            </fieldset>
        </form>
    <a href="index.php">Volver</a>
</body>
</html>