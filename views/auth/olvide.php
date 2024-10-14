<div class="contenedor olvide">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu contraseña</p>

        <form action="/olvide" method="post" class="formulario">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu email">
            </div>

            <input type="submit" value="Recuperar" class="boton">
        </form>

        <div class="acciones">
            <a href="/">Iniciar sesión</a>
            <a href="/crear">¿No tienes cuenta?</a>
        </div>
    </div> <!-- .contenedor-sm -->
</div>