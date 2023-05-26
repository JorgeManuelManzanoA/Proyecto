<?php
$contrasena = "AVNS_Ln5yI4lx_R8UW29lb4s";
$usuario = "doadmin";
$nombre_bd = "hospital";

try {
    $bd = new PDO(
        'mysql:host=db-mysql-nyc1-61112-do-user-14089120-0.b.db.ondigitalocean.com;dbname=' . $nombre_bd,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Problema con la conexión: " . $e->getMessage();
}
?>
