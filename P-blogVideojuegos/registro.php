<?php
if(isset($_POST)) {
    // conexion a la base de datos
    require_once 'includes/conexion.php';

    if (!isset($_SESSION)) session_start();

    // recogiendo los valores del formulario registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($bd, $_POST['password']) : false;
    $errores = array();

    // validar los datos entes de guardarlos en la base de datos
    if (empty($nombre) && is_numeric($nombre) && preg_match('/[0-9]/', $nombre)) $errores['nombre'] = 'El nombre no es valido';
    if (empty($apellidos) && is_numeric($apellidos) && preg_match('/[0-9]/', $apellidos)) $errores['apellidos'] = 'Los apellidos no son validos';
    if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores['email'] = 'El email no es valido';
    if (empty($password)) $errores['password'] = 'La contraseña esta vacia';

    // validando si se guarda o no el nuevo registro
    if(count($errores) == 0) {
        // cifrando la contraseña
        $password_cifrada = password_hash($password, PASSWORD_BCRYPT, ['COST' => 4]);

        // insertando el registro en la base de datos
        $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_cifrada', CURDATE());";
        $guardar = mysqli_query($bd, $sql);

        $guardar ? $_SESSION['completado'] = "El registro se ha completado con exito" : $_SESSION['errores_general'] = 'Fallo al guardar el registro';
    } else {
        $_SESSION['errores'] = $errores;
    }
}
header('location: index.php');