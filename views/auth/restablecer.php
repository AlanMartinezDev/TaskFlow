<div class="contenedor restablecer">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Restablecer tu contraseña</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <?php if ($mostrar) { ?>

            <form method="POST" class="formulario">
                <div class="campo">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Tu password">
                </div>

                <input type="submit" value="Restablecer" class="boton">
            </form>

        <?php } ?>

        <div class="acciones">
            <a href="/">Iniciar sesión</a>
            <a href="/crear">¿No tienes cuenta?</a>
        </div>
    </div> <!-- .contenedor-sm -->
</div>