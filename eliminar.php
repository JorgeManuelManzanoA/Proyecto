<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$bd->beginTransaction();

try {
    // Eliminar los datos de la tabla "promociones" vinculados al código del paciente
    $sentenciaPromociones = $bd->prepare("DELETE FROM promociones WHERE id_persona = ?;");
    $sentenciaPromociones->execute([$codigo]);

    // Eliminar los datos de la tabla "pacientes"
    $sentenciaPacientes = $bd->prepare("DELETE FROM pacientes WHERE codigo = ?;");
    $sentenciaPacientes->execute([$codigo]);

    $bd->commit();
    header('Location: index.php?mensaje=eliminado');
} catch (PDOException $e) {
    $bd->rollBack();
    header('Location: index.php?mensaje=error');
}
?>