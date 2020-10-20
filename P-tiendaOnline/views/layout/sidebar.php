<!-- BARRA LATERAL -->
<aside class="lateral">
    <div class="block_aside">
        <?php if(!isset($_SESSION['identity'])): ?>
            <form action="<?=base_url?>usuario/login" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email">

                <label for="password">Contraseña:</label>
                <input type="password" name="password">

                <input type="submit" value="Enviar">
            </form>
        <?php else: ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>
    </div>
    <!-- login -->

    <ul>
        <?php if(isset($_SESSION['admin'])): ?>
            <li> <a href="<?php base_url ?>categoria/index">Gestiona categorias</a> </li>
            <li> <a href="#">Gestionar productos</a> </li>
            <li> <a href="#">Gestionar pedidos</a> </li>
        <?php endif; ?>

        <?php if(isset($_SESSION['identity'])): ?>
            <li> <a href="#">Mis pedidos</a> </li>
            <li> <a href="<?=base_url?>usuario/logout">Cerrar sesion</a> </li>
        <?php else: ?>
            <li> <a href="<?=base_url?>usuario/registro">Registrate aquí</a> </li>
        <?php endif; ?>
    </ul>
</aside>

<!-- CONTENIDO CENTRAL -->
<div class="central">