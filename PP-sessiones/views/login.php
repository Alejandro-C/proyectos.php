<form action="">
    <h2 class="text-center">Iniciar Sesion</h2>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="d-row text-center mb-3">
        <a href="<?=base_url?>" class="btn btn-secondary btn-lg col-5">Volver</a>
        <input type="submit" class="btn btn-success btn-lg col-5" value="Iniciar Sesion">
    </div>

    <p class="text-center">¿No estas registrado? <a href="<?=base_url?>?controller=User&action=signIn">Registrarme</a></p>
</form>