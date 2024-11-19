<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/conexion.php';


$host = "localhost";
$namedb = "dbsistema";
$userdb = "root";
$passwordb = "";

$conexion = new conexion($host, $namedb, $userdb, $passwordb);

$pdo = $conexion->obtenerconexion();
$query = $pdo->query("select id, username, perfil, password from usuarios");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver</title>
</head>

<body>


    <div class="content">
        <h1>Ver</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Perfil</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['perfil'] ?></td>
                        <td><?= $row['password'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>