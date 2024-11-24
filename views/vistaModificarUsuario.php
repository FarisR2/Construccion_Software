<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

function mostrarFormularioModificacion($userData)
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vista Modificar</title>
    </head>

    <body>
        <?php if (!empty($userData["id"])): ?>
            <!-- Formulario de modificación -->
            <form action="" method="POST">
                <input type="hidden" name="user_id" value="<?= $userData["id"] ?>">

                <div class="form-icon">
                    <i class="fas fa-user"></i>
                    <label for="new_username">Nuevo Usuario:</label>
                </div>
                <input type="text" name="new_username" id="new_username" value="<?= $userData["username"] ?>" required>

                <div class="form-icon">
                    <i class="fas fa-key"></i>
                    <label for="new_password">Nuevo Password:</label>
                </div>
                <input type="text" name="new_password" id="new_password" value="<?= $userData["password"] ?>" required>

                <div class="form-icon">
                    <i class="fas fa-address-card"></i>
                    <label for="new_perfil">Nuevo Perfil:</label>
                </div>
                <input type="text" name="new_perfil" id="new_perfil" value="<?= $userData["perfil"] ?>" required>

                <button type="submit" name="update_user"><i class="fas fa-save"></i> Actualizar</button>
            </form>
        <?php endif; ?>
    </body>

    </html>

<?php
}
?>
<?php

function buscarUsuario()
{
?>

    <?php if (empty($userData["id"])) {  ?>

        <form action="../controllers/controladorModificarUsuario.php" method="POST">
            <input type="text" name="search_username" id="search_username" placeholder="Nombre de usuario" required>
            <button type="submit" name="search_user"><i class="fas fa-search"></i> Buscar</button>
        </form>
    <?php
    } ?>

    <!-- Formulario de búsqueda -->


<?php
}

?>