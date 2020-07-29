<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php' ?>
<?php require_once 'includes/lateral.php' ?>

<div class="principal" id="principal">
    <h2>Crear Entradas</h2>

    <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar del contenido</p> <br>

    <form action="guardar-entrada.php" method="post">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ?>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ?>

        <label for="categorias">Categorias:</label>
        <select name="categorias">
            <?php
                $categorias = conseguirCategorias($bd);
                if (!empty($categorias)):
                    while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>

                        <option value="<?= $categoria['id'] ?>"> <?= $categoria['nombre'] ?> </option>

            <?php
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categorias') : '' ?>

        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>

</div>
<!-- principal -->

<?php require_once 'includes/pie.php' ?>