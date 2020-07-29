<?php require_once 'conexion.php' ?>
<?php require_once 'includes/helpers.php' ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header class="cabecera" id="cabecera">
        <div class="logo" id="logo">
            <a href="index.php">Blog de Videojuegos</a>
        </div>
        <!-- logo -->

        <nav class="menu" id="menu">
            <ul>
                <li> <a href="index.php">Inicio</a> </li>

                <?php 
                    $categorias = conseguirCategorias($bd);
                    if(!empty($categorias)):
                        while($categoria = mysqli_fetch_assoc($categorias)): 
                ?>
                            <li> <a href="categoria.php?id= <?= $categoria['id'] ?>"> <?= $categoria['nombre'] ?> </a> </li>
                <?php 
                        endwhile;
                    endif; 
                ?>

                <li> <a href="#">Sobre mí</a> </li>
                <li> <a href="#">Contacto</a> </li>
            </ul>
        </nav>
        <!-- menu -->

        <div class="clearfix"></div>
    </header>

    <div class="contenedor" id="contenedor">