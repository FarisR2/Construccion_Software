<?php
function vistaLogin($error)
{ ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" href="<?php echo get_css('styles.css'); ?>">
    </head>

    <body>
        <div class="contenedor-login">
            <div id="loader" class="loader-overlay">
                <div class="loader"></div>
            </div>

            <div class="ladoizquierdo">
                <img src="<?php echo get_img('avatar.png'); ?>" alt="">
                <p class="username">Username</p>
                <p class="password">Password</p>
            </div>
            <div class="contenedor-header">
                LOGIN
            </div>
            <article class="ladoderecho">
                <form action="../controllers/controladorLogin.php" method="POST">
                    <label for="username">Username</label>
                    <input type="text" class="txtusername" name="txtusername" placeholder="Enter your username" required>

                    <label for="password">Password</label>
                    <input type="password" class="txtpassword" name="txtpassword" placeholder="Enter your password"
                        required>

                    <span class="error"></span>

                    <div class="submit">
                        <button type="submit">Sign in</button>
                    </div>
                </form>
            </article>

            <!-- Forgot -->
            <div class="forget">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#">Forgot Password?</a>
                </section>
            </div>

            <span class="register">
                <p>Don't have an account?</p><a href="<?php echo get_views('registar.php'); ?>">Sign Up</a>
            </span>
        </div>
    </body>

    </html>

    <?php

}
?>