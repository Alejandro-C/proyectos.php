<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<div class="principal" id="principal">
    <h2>Todas Las Entradas</h2>

    <?php
        $entradas = conseguirEntradas($bd, false);
        if (!empty($entradas)):
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
        endif;
    ?>
</div>
<!-- principal -->

<?php require_once 'includes/pie.php' ?>