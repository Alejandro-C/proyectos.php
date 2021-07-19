<?php
    $utilsModel = new Utils();
    $userTemp = '';
    $errors = array();

    if(isset($_POST) && count($_POST) != 0){
        $userController = new UserController();
        $userData = array();

        // obteniendo los datos enviardos
        $userData['user'] = isset($_POST['user']) ? trim($_POST['user']) : false;
        $userData['password'] = isset($_POST['password']) ? trim($_POST['password']) : false;

        // validandar los datos enviados
        $errors = $userController->validatingLogin($userData);

        if(count($errors) == 0){
            $user = $userController->getUserData();

            // Iniciar Sesion
            $_SESSION['user'] = $user;
            header('Location:'.base_url);
        } else {
            // autocompletar los datos en el formulario
            $userTemp = $userData['user'];
        }
    }
?>

<form action="?controller=User&action=login" method="POST">
    <h2 class="text-center">Iniciar Sesion</h2>

    <div class="mb-3">
        <label for="user" class="form-label">Usuario/Email:</label>
        <input type="text" class="form-control <?=$utilsModel->putClass($errors, 'user')?>" 
                id="user" name="user" value="<?=$userTemp?>" placeholder="Ingresa el nombre de usuario o tu email">

        <?php if(isset($errors['user'])): ?>
            <p class="ms-2 text-danger"><?= $errors['user'] ?></p>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" class="form-control <?=$utilsModel->putClass($errors, 'password')?>" 
                id="password" name="password">

        <div class="form-check ms-2 mt-1">
            <input class="form-check-input" type="checkbox" value="on" id="showPassword" onclick="showPass();">
            <label class="form-check-label" for="showPassword">
                Mostrar contraseña
            </label>
        </div>

        <?php if(isset($errors['password'])): ?>
            <p class="ms-2 text-danger"><?= $errors['password'] ?></p>
        <?php endif; ?>
    </div>

    <div class="d-row text-center mb-3">
        <a href="<?=base_url?>" class="btn btn-secondary btn-lg col-5">Volver</a>
        <input type="submit" class="btn btn-success btn-lg col-5" value="Iniciar Sesion">
    </div>

    <p class="text-center">¿No estas registrado? <a href="<?=base_url?>?controller=User&action=signIn">Registrarme</a></p>
</form>

<script>
    function showPass(){
        let checkbox = document.getElementById('showPassword');
        let inputPass = document.getElementById('password');

        if(checkbox.checked){
            inputPass.type = 'text'
        } else {
            inputPass.type = 'password'
        }
    }
</script>