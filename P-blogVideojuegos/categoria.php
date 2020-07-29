<?php require_once 'includes/cabecera.php' ?>
<?php $categoria_actual = conseguirCategoria($bd, $_GET['id']); 
    if (!isset($categoria_actual['id'])) header('Location: index.php');
?>
<?php require_once 'includes/lateral.php' ?>

<div class="principal" id="principal">
    <h2>Entradas De <?= $categoria_actual['nombre'] ?></h2>

    <?php
        $entradas = conseguirEntradas($bd, null, $_GET['id']);
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