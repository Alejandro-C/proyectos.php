<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- CABECERA -->
    <header class="header">
        <div class="logo">
            <img src="assets/img/camiseta.png" alt="Logo camiseta">
            <a href="index.php">Tienda de Camisetas</a>
        </div>
    </header>

    <!-- MENU -->
    <nav class="menu">
        <ul>
            <li> <a href="#">Inicio</a> </li>
            <li> <a href="#">Categoria 1</a> </li>
            <li> <a href="#">Categoria 2</a> </li>
            <li> <a href="#">Categoria 3</a> </li>
            <li> <a href="#">Categoria 4</a> </li>
            <li> <a href="#">Categoria 5</a> </li>
        </ul>
    </nav>

    <div class="content">
        <!-- BARRA LATERAL -->
        <aside class="lateral">
            <div class="block_aside">
                <form action="#" method="post">
                    <label for="email">Email:</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña:</label>
                    <input type="password" name="password">

                    <input type="submit" value="Enviar">
                </form>
            </div>
            <!-- login -->

            <ul>
                <li> <a href="#">Mis pedidos</a> </li>
                <li> <a href="#">Gestionar pedidos</a> </li>
                <li> <a href="#">Gestiona categorias</a> </li>
            </ul>
        </aside>

        <!-- CONTENIDO CENTRAL -->
        <div class="central">
            <h1>Productos destacados</h1>

            <div class="product">
                <img src="assets/img/camiseta.png" alt="imagen camiseta">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" alt="imagen camiseta">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" alt="imagen camiseta">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" alt="imagen camiseta">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" alt="imagen camiseta">
                <h2>Camiseta Azul Ancha</h2>
                <p>30 euros</p>
                <a href="#" class="button">comprar</a>
            </div>
        </div>
        <!-- central -->
    </div>
    <!-- content -->

    <!-- PIE DE PAGINA -->
    <footer class="footer">
        <p>Desarrollado por Ever Carvajal &copy; <?= date('Y') ?></p>
    </footer>
</body>
</html>