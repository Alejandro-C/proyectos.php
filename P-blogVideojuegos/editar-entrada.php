<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php' ?>
<?php 
    $entrada_actual = conseguirEntrada($bd, $_GET['id']); 
    if (!isset($entrada_actual['id'])) header('Location: index.php');
?>
<?php require_once 'includes/lateral.php' ?>

<div class="principal" id="principal">
    <h2>Editar Entradas</h2>

    <p>Edita tu entrada: <?= $entrada_actual['titulo'] ?></p> <br>

    <form action="guardar-entrada.php?editar=<?= $entrada_actual['id'] ?>" method="post">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?= $entrada_actual['titulo'] ?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ?>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" cols="30" rows="10"><?= $entrada_actual['descripcion'] ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ?>

        <label for="categorias">Categorias:</label>
        <select name="categorias">
            <?php
                $categorias = conseguirCategorias($bd);
                if (!empty($categorias)):
                    while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>

                        <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                            <?= $categoria['nombre'] ?>
                        </option>

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