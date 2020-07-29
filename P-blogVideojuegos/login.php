<?php
if (isset($_POST)) {
    // borrar error antiguo
    if (isset($_SESSION['error_login'])) $_SESSION['error_login'] = null;

    // iniciar sesion y conexion a la base de datos 'bd'
    require_once 'includes/conexion.php';
    if ($_SESSION) session_start();

    // recoger los datos del formulario 
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($bd, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        
        // combrobar la contraseña
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {
            // utilizar una sesion para guardar los datos del usuario
            $_SESSION['usuario'] = $usuario;
        } else {
            // si algo falla eviar una sesion con el falla
            $_SESSION['error_login'] = 'Login incorrecto!!';
        }
    } else {
        $_SESSION['error_login'] = 'Login incorrecto!!';
    }
    // redireccionar a index.php
    header('Location: index.php');
}
