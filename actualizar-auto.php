<?php
include "auto.php";

$id = $_GET['id'];

$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$descripcion = $_POST["descripcion"];

$db = new mysqli("localhost", "root", "", "bdprueba");

if ($db->connect_errno) {
    print "Error en la conexión " . $db->connect_errno;
    exit();
}

$stmt = "update autos set
                placa = '$placa',
                modelo = '$modelo',
                marca = '$marca',
                descripcion = '$descripcion'
            where id = $id";

$resultado = $db->query($stmt);

echo '<div class="my-3" style="padding-left: 15px">';

if ($resultado)
    echo "<p>Auto actualizado correctamente.</p>";
else
    echo "<p>Error al actualizar los datos</p>";

echo '    <a href="listar-autos.php" class="btn btn-secondary">Regresar al listado.</a>';
echo '</div>';

?>