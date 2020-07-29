<?php
if(isset($_POST)) {
    // conexion a la base de datos
    require_once 'includes/conexion.php';

    if (!isset($_SESSION)) session_start();

    // recogiendo los valores del formulario registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email'])) : false;
    $errores = array();

    // validar los datos entes de guardarlos en la base de datos
    if (empty($nombre) && is_numeric($nombre) && preg_match('/[0-9]/', $nombre)) $errores['nombre'] = 'El nombre no es valido';
    if (empty($apellidos) && is_numeric($apellidos) && preg_match('/[0-9]/', $apellidos)) $errores['apellidos'] = 'Los apellidos no son validos';
    if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores['email'] = 'El email no es valido';

    // validando si se actualiza o no el nuevo registro
    if(count($errores) == 0) {
        // comprobar si el email ya existe
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
        $isset_email = mysqli_query($bd, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
            // actualizando el registro en la base de datos
            $usuario = $_SESSION['usuario'];
            $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email'
                    WHERE id = " .$usuario['id'] .";";
            $guardar = mysqli_query($bd, $sql);

            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se han actualizado con exito";
            } else {
                $_SESSION['errores_general'] = 'Fallo al actualizar los datos';
            }
        }  else {
            $_SESSION['errores_general'] = 'El usuario ya exite';
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}
header('location: mis-datos.php');