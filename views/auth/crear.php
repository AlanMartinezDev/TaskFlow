<div class="contenedor crear">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en TaskFlow</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form action="/crear" method="POST" class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $usuario->nombre; ?>" placeholder="Tu nombre">
            </div>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $usuario->email ?>" placeholder="Tu email">
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu password">
            </div>
            <div class="campo">
                <label for="password2">Repetir password</label>
                <input type="password" name="password2" id="password2" placeholder="Repite tu password">
            </div>

            <input type="submit" value="Crear cuenta" class="boton">
        </form>

        <div class="acciones">
            <a href="/">Iniciar sesión</a>
            <a href="/olvide">¿Olvidaste tu password?</a>
        </div>
    </div> <!-- .contenedor-sm -->
</div>