<?php

class ShowIndex {

    public function __construct() {
        if (isset($_SESSION['user_id'])) {
            echo "Hola" . $_SESSION['user_name'];
            echo "<br/><br/>";
            echo "<a href='logout.php'>Log out</a>";
        }
        echo "Registro <a href='register.php'>aqui</a> <br />";
        echo "Autentificacion <a href='login.php'>aqui</a> <br />";
        echo "Busqueda <a href='find/index.php'>aqui</a>";
    }
}

?>
