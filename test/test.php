<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $_SESSION['favcolor'] = "green";
    $_SESSION['favanimal'] = "cat";
    ?>

    <a href="./vervariables.php">ir a ver la variables</a>
</body>

</html>