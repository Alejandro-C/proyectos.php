<h1 class="text-center m-3">Ejercicio de Sessiones</h1>

<p>
    Este es un programa en el cual pondremos en practica las sessiones con PHP, en este programa podremos registrarnos ingresando un nombre de usuario, este debe de ser unico, tambien debemos de ingresar un email y una contraseña.
</p>

<h2 class="text-center">Usuarios Registrados</h2>

<?php
    // instanciando un controlador y sacando a los usuarios registrados
    $userController = new UserController();
    $users = $userController->getUsers();

    if(count($users)):
?>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
            </tr>
        </thead>

        <tbody>
            <?php for($i=0; $i < count($users); $i++): ?>
                <tr>
                    <th scope="row"><?=$i+1?></th>
                    <td><?=$users[$i][1]?></td>
                    <td><?=$users[$i][2]?></td>
                    <td><?=$users[$i][3]?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="container bg-light border rounded">
        <p class="text-center m-2">No hay usuarios registrados</p>

        <div class="text-center">
            <a href="<?=base_url?>?controller=User&action=signIn" class="btn btn-success mb-2">Registrar Usuario</a>
        </div>
    </div>
<?php endif; ?>