<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<div class="principal" id="principal">
    <h2>Mis datos</h2>

    <!-- mostrar errores -->
    <?php if(isset($_SESSION['completado'])): ?>
        <div class="alerta"> <?= $_SESSION['completado'] ?> </div>
    <?php elseif (isset($_SESSION['errores_general'])): ?>
        <div class="alerta alerta-error"> 
            <p> <?= $_SESSION['errores_general'] ?> </p>
        </div>
    <?php endif; ?>

    <form action="actualizar-usuario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombres" value="<?= $_SESSION['usuario']['nombre'] ?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidoss" value="<?= $_SESSION['usuario']['apellidos'] ?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ?>

        <label for="email">Email:</label>
        <input type="email" name="email" id="emaill" value="<?= $_SESSION['usuario']['email'] ?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>

        <input type="submit" name="submit" value="Actualizar">
    </form>

    <?php borrarErrores() ?>
</div>
<!-- principal -->

<?php require_once 'includes/pie.php' ?>