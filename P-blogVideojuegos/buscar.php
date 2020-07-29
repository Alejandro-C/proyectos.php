<?php require_once 'includes/cabecera.php' ?>
<?php if (!isset($_POST['busqueda'])) header('Location: index.php'); ?>
<?php require_once 'includes/lateral.php' ?>

<div class="principal" id="principal">
    <h2>Busqueda: <?= $_POST['busqueda'] ?></h2>

    <?php
        $entradas = conseguirEntradas($bd, null, null, $_POST['busqueda']); 

        if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):
            While ($entrada = mysqli_fetch_assoc($entradas)):
    ?>

                <article class="entrada">
                    <a href="entrada.php?id=<?= $entrada['id'] ?>">
                        <h3> <?= $entrada['titulo'] ?> </h3>
                        <span class="fecha"> <?= $entrada['categoria'] ." | " .$entrada['fecha'] ?> </span>
                        <p> <?= substr($entrada['descripcion'], 0, 180) ."..."; ?> </p>
                    </a>
                </article>

    <?php
            endwhile;
        else:
    ?>
            <div class="alerta">No hay entradas en esta categoria.</div>
    <?php endif; ?>
</div>
<!-- principal -->

<?php require_once 'includes/pie.php' ?>