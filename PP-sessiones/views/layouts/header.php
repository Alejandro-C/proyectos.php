<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sessiones</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/main.css">
</head>
<body>
    <?php
        // validando que tipo de contenedor mostrar
        $container = 'container';
        if(isset($_GET['action']) == 'signIn' || isset($_GET['action']) == 'login'):
            $container = 'container-target';
        else:
    ?>
        <!-- barra de navegacion -->
        <nav class="navbar navbar-dark bg-dark d-flex">
            <div class="container">
                <a class="text-decoration-none" href="<?=base_url?>">
                    <h2 class="text-light m-0 fw-normal">Sessiones</h2>
                </a>

                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-light fs-3" href="<?=base_url?>?controller=User&action=signIn">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-light fs-3" href="<?=base_url?>?controller=User&action=login">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>

    <div class="<?=$container?> shadow p-3 mb-5 bg-body rounded">