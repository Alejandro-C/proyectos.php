<h1 class="text-center m-3">Ejercicio de Sessiones</h1>

<p>
    Este es un programa cuenta con las funciones basicas de un CRUD (Listar, Crear, Editar y Eliminar) tambien pondremos en practica el uso de las sessiones con PHP.
</p>

<p>
    Para el registro de usuarios nesecitaremos llenar los campos Usuario, Email y Contraseña, los campos Usuario y Email deben de ser unicos. Para iniciar sesion deberemos de llenar los campos Usuario/Email (se puede ingresar con el usuario o ingresando el correo electronico) y Contraseña.
</p>

<h2 class="text-center">Usuarios Registrados</h2>

<?php
    // instanciando un controlador y sacando a los usuarios registrados
    $userController = new UserController();
    $users = $userController->getUsers();
    $action = base_url.'?controller=User&action=';

    if(count($users)):
?>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php for($i=0; $i < count($users); $i++): ?>
                <tr>
                    <th scope="row"><?=$i+1?></th>
                    <td><?=$users[$i][1]?></td>
                    <td><?=$users[$i][2]?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-danger" onclick="url('<?=$action?>delete', <?=$users[$i][0]?>);" 
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Eliminar
                            </button>

                            <button type="button" class="btn btn-warning" onclick="url('<?=$action?>edit', <?=$users[$i][0]?>);">
                                Editar
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <!-- Modal para confirmacion de eliminar -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="106" height="106" fill="currentColor" 
                                class="bi bi-exclamation-circle text-warning m-3" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>
                    </div>

                    <h3 class="text-center fw-normal mb-4">
                        Está seguro que desea eliminar este registro?
                    </h3>

                    <div class="text-center">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <a href="#" class="btn btn-success" id="aEliminar">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function url(action, id){
            let elemento = document.getElementById("aEliminar");
            elemento.href = `${action}&id=${id}`;
        }
    </script>

<?php else: ?>
    <div class="container bg-light border rounded">
        <p class="text-center m-2">No hay usuarios registrados</p>

        <div class="text-center">
            <a href="<?=base_url?>?controller=User&action=signIn" class="btn btn-success mb-2">Registrar Usuario</a>
        </div>
    </div>
<?php endif; ?>