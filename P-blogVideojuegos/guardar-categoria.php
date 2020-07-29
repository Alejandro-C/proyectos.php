<?php
if ($_POST) {
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
    $errores = array();

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) $errores['errores'] = 'El nombre no es valido';

    if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($bd, $sql);
    }
}
header("Location: index.php");