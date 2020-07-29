<aside class="sidebar" id="sidebar">
        <div class="bloque" id="buscador">
            <h3>Buscador:</h3>

            <form action="buscar.php" method="POST">
                <label for="busqueda">Buscar:</label>
                <input type="text" name="busqueda">

                <input type="submit" value="Buscar">
            </form>
        </div>
        <!-- login -->

    <?php if(isset($_SESSION['usuario'])): ?>
        <div class="bloque" id="usuarioLogueado">
            <h3>Bienvanido, <?= $_SESSION['usuario']['nombre'] .' ' .$_SESSION['usuario']['apellidos']; ?> </h3>

            <!-- botones -->
            <a href="crear-entradas.php" class="boton">Crear Entrada</a>
            <a href="crear-categoria.php" class="boton">Crear categoria</a>
            <a href="mis-datos.php" class="boton">Mis datos</a>
            <a href="cerrar.php" class="boton">Cerrar sesion</a>
        </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['usuario'])): ?>

        <div class="bloque" id="login">
            <h3>Identificate</h3>

            <?php if(isset($_SESSION['error_login'])): ?>
                <div class="alerta alerta-error"> <?= $_SESSION['error_login'] ?> </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Entrar">
            </form>
        </div>
        <!-- login -->

        <div class="bloque" id="registro">
            <h3>Registrate</h3>

            <!-- mostrar errores -->
            <?php if(isset($_SESSION['completado'])): ?>
                <div class="alerta"> <?= $_SESSION['completado'] ?> </div>
            <?php elseif (isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error"> 
                    <p> <?php $_SESSION['errores_general'] ?> </p>
                </div>
            <?php endif; ?>

            <form action="registro.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombres">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidoss">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ?>

                <label for="email">Email:</label>
                <input type="email" name="email" id="emaill">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="passwords">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ?>

                <input type="submit" name="submit" value="Registrarse">
            </form>

            <?php borrarErrores() ?>
        </div>
        <!-- registro -->

    <?php endif; ?>
</aside>