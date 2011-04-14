<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="messages.js"></script>


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