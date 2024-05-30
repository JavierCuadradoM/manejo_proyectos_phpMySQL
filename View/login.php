<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
    <title>Login</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section class="contenedor">
            <h2>Login</h2>
            <form action="../Controller/CRUDAdministrador.php" method="post">
                <input type="hidden" name="accion" value="login">
                <div>
                    <label for="usuario">Username: </br>
                        <input type="text" name="nombreusuario" required>
                    </label>
                </div>

                <div>
                    <label for="contraseña">Password: </br>
                        <input type="password" name="passwd" required>
                    </label>    
                </div>
                <div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <a href="register.php"> <h3>¿No tienes cuenta? Registrarme</h3></a>
    </footer>
</body>
</html>