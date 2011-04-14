<?php
require('model_register.php');

session_start();

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