<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<link rel="stylesheet" type="text/css" href="style.css" />

<?php
$page_mode = isset($_POST['page_mode']) ? $_POST['page_mode'] : '';
?>
<html>
    <head>
        <title>Busqueda</title>
    </head>
    <body>
        <form name="form" id="form" class="form" action="index.php" method="post">
            <fieldset>
                <legend>
                    <span>Busqueda</span>
                </legend>
                <input type="hidden" name="page_mode" id="page_mode" value="find" />
                <div>
                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" />
                </div>
                <div>
                    <label for="surname">Apellido</label>
                    <input id="surname" name="surname" type="text" />
                </div>
                <div>
                    <label for="phone">Telefono</label>
                    <input id="phone" name="phone" type="text" />
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="text" />
                </div>
                <div>
                    <label for="user_name">Usuario</label>
                    <input id="user_name" name="user_name" type="text" />
                </div>
                <div>
                    <label for="state">Estado</label>
                    <input id="state" name="state" type="text" />
                </div>
                <div>
                    <label for="paid">Pago</label>
                    <input id="paid" name="paid" type="text" />
                </div>
                <div>
                    <label for="league">Liga</label> <br />
                    <input id="league" name="league" type="text" />
                </div>
            </fieldset>
            <fieldset class="submit">
                <input name="submit" id="submit" value="Buscar" type="submit" class="button"/>
            </fieldset>
        </form>
    </body>
</html>

<?php
//obtenemos valores que envió la funcion en
//Javascript mediante el metodo GET
$refresh = false;
if (isset($_GET['campo']) and isset($_GET['orden'])) {
    $refresh = true;
    $campo = $_GET['campo'];
    $orden = $_GET['orden'];
    $name = $_GET['name'];
    $surname = $_GET['surname'];
} else {
    //por defecto
    $campo = 'name1';
    $orden = 'ASC';
    $name = "";
    $surname = "";
}
if ($page_mode == 'find' || $refresh == true) {
    if ($page_mode == 'find') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
    }
    ?>
    <table cellspacing="0" cellpading="0">
        <tr class="encabezado">
            <?php
            //definimos dos arrays uno para los nombre de los campos de la tabla y
            //para los nombres que mostraremos en vez de los de la tabla -encabezados
            $campos = "name1,surname1";
            $cabecera = "Equipo,Apellido";

            //los separamos mediante coma
            $cabecera = explode(",", $cabecera);
            $campos = explode(",", $campos);

            //numero de elementos en el primer array
            $nroItemsArray = count($campos);

            //iniciamos variable i=0
            $i = 0;

            //mediante un bucle crearemos las columnas
            while ($i <= $nroItemsArray - 1) {
                //comparamos: si la columna campo es igual al elemento
                //actual del array
                if ($campos[$i] == $campo) {
                    //comparamos: si esta Descendente cambiamos a Ascendente
                    //y viceversa
                    if ($orden == "DESC") {
                        $orden = "ASC";
                        $flecha = "../images/arrow_down.gif";
                    } else {
                        $orden = "DESC";
                        $flecha = "../images/arrow_up.gif";
                    }
                    //si coinciden campo con el elemento del array
                    //la cabecera tendrá un color distinto
                    echo "<td class=\"encabezado_selec\"><a onclick=\"OrdenarPor('" . $campos[$i] . "','" . $orden . "','" . $name . "','" . $surname . "')\"><img src=\"" . $flecha . "\" />" . $cabecera[$i] . "</a></td> \n";
                } else {
                    //caso contrario la columna no tendra color
//                    echo "<td><a onclick=\"OrdenarPor('" . $campos[$i] . "','DESC')\">" . $cabecera[$i] . "</a></td> \n";
                    echo "<td><a onclick=\"OrdenarPor('" . $campos[$i] . "','DESC', '" . $name . "','" . $surname . "')\" >" . $cabecera[$i] . "</a></td> \n";
                }
                $i++;
            }
            ?>
        </tr>
        <?php

        // Esta funcion permite comparar el campo actual y el nombre de 
        // la columna en la base de datos
        function estiloCampo($_campo, $_columna) {
            if ($_campo == $_columna) {
                return " class=\"filas_selec\"";
            } else {
                return "";
            }
        }

        // Database connection data. 
        require_once 'db.php';
        // Realizamos la consulta de los equipos
        // Ordenandolos segun campo y asc o desc
        $where = "";
        if ($name !== "") {
            $where .= "WHERE name1='" . mysql_real_escape_string($name) . "'";
            $where .= "OR name2='" . mysql_real_escape_string($name) . "'";
        }
        if ($surname !== "") {
            $where .= "WHERE name1='" . mysql_real_escape_string($name) . "'";
            $where .= "OR name2='" . mysql_real_escape_string($name) . "'";
        }
        $result = db_query("SELECT * FROM team  $where ORDER BY $campo $orden");
//        if ($surname == "") {
//            
//        }
        //mostramos los resultados mediante la consulta de arriba
        while ($MostrarFila = mysql_fetch_array($result)) {
            $id = $MostrarFila['id'];
            echo "<tr> \n";
//            echo "<td" . estiloCampo($campo, 'name1') . ">" . $MostrarFila['name1'] . "</td> \n";
            echo "<td" . estiloCampo($campo, 'name1') . ">" . $MostrarFila['name1'] . " " . $MostrarFila['surname1'] . " / " . $MostrarFila['name2'] . " " . $MostrarFila['surname2'] . "</td> \n";
            echo "<td" . estiloCampo($campo, 'surname1') . ">" . $MostrarFila['surname1'] . "</td> \n";
            echo "</tr> \n";
        }
    }
    ?>
</table>
<br /><a href="index.php">Volver</a>