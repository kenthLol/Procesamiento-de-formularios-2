<?php
$id = $_GET["id"];

$db = new mysqli("localhost", "root", "", "bdprueba");

if ($db->connect_errno) {
    print "Error en la conexión " . $db->connect_errno;
    exit();
}

$stmt = "delete from autos where id = '$id'";

$resultado = $db->query($stmt);

echo '<div class="my-3" style="padding-left: 15px">';

if ($resultado)
    echo "<p>Alumno eliminado correctamente.</p>";
else
    echo "<p>Error al actualizar los datos</p>";

echo '    <a href="listar.php" class="btn btn-secondary">Regresar al listado.</a>';
echo '</div>';
?>