<h1>Registrarse</h1>

<form action="index.php?controller=usuario&action=save" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" require>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" require>

    <label for="email">Email:</label>
    <input type="email" name="email" require>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" require>

    <input type="submit" value="Registrarse">
</form>