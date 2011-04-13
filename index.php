<link rel="stylesheet" type="text/css" href="css/style.css" />
<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php Hola . $_SESSION['user_name']; ?>
        <br /><br />;
        <a href='logout.php'>Log out</a>;
    <?php else: ?>
        Registro <a href='modules/register/view_register.php'>aqui</a> <br />
        Autentificacion <a href='view_login.php'>aqui</a> <br />
        Busqueda <a href='find/view_index.php'>aqui</a>
    <?php endif; ?>
</body>
</html>