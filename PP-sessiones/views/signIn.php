<?php
    $utilsModel = new Utils();

    $userTemp = '';
    $emailTemp = '';

    // array de errores
    $errors = array();

    if(isset($_POST) && count($_POST) != 0){
        $userController = new UserController();
        $db = DataBase::connect();
        $userData = array();

        // obteniendo los datos enviardos
        $userData['user'] = isset($_POST['user']) ? mysqli_real_escape_string($db, trim($_POST['user'])) : false;
        $userData['email'] = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $userData['password'] = isset($_POST['password']) ? mysqli_real_escape_string($db, trim($_POST['password'])) : false;

        // validandar los datos enviados
        $errors = $userController->validatingSignIn($userData);

        if(count($errors) == 0){
            // guardar usuario
            if(!$userController->saveUser($userData)){
                $errors['general'] = 'El usuario no se ha podido registrar.';

                // saltar a la etiqueta error
                goto error;
            }

            header('Location:'.base_url);
        } else {
            error:

            // autocompletar los datos en el formulario
            $userTemp = $userData['user'];
            $emailTemp = $userData['email'];
        }
    }
?>

<!-- div para mostrar un error general al enviar el formulario -->
<?php if(isset($errors['general'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $errors['general'] ?>
    </div>
<?php endif; ?>

<form action="?controller=User&action=signIn" method="POST">
    <h2 class="text-center">Registro</h2>

    <div class="mb-3">
        <label for="user" class="form-label">Usuario:</label>
        <input type="text" class="form-control <?=$utilsModel->putClass($errors, 'user')?>" 
                id="user" name="user" value="<?=$userTemp?>">

        <?php if(isset($errors['user'])): ?>
            <p class="ms-2 text-danger"><?= $errors['user'] ?></p>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control <?=$utilsModel->putClass($errors, 'email')?>" 
                id="email" name="email" value="<?=$emailTemp?>" placeholder="name@example.com">

        <?php if(isset($errors['email'])): ?>
            <p class="ms-2 text-danger"><?= $errors['email'] ?></p>
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
        <input type="submit" class="btn btn-success btn-lg col-5" value="Registrar">
    </div>

    <p class="text-center">¿Ya estas registrado? <a href="<?=base_url?>?controller=User&action=login">Iniciar Sesion</a></p>
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