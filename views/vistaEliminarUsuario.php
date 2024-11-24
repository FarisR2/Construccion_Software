<?php

function mostrarFormularioEliminacion()
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar Usuario</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>
        <div class="container">
            <h1><i class="fas fa-trash-alt"></i> Eliminar Usuario</h1>
            <br>
            <form action="../controllers/controladorEliminarUsuario.php" method="POST">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="datusuario" id="datusuarioS" placeholder="Nombre de usuario" required>
                </div>
                <button type="submit"><i class="fas fa-trash"></i> Eliminar</button>
            </form>

        </div>
    </body>
<?php
}

?>