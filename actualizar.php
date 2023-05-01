<?php
include "alumno.php";

$id = $_GET['id'];
$carnet = $_POST["carnet"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$edad = $_POST["edad"];
$curso = $_POST["curso"];
$foto = $_FILES["foto"];

$db = new mysqli("localhost", "root", "", "bdprueba");

if ($db->connect_errno) {
    print "Error en la conexión " . $db->connect_errno;
    exit();
}

$stmt = "update alumnos set
                nombre = '$nombre', 
                carnet = '$carnet',
                edad = '$edad',
                correo = '$correo' ,
                curso = '$curso'
            where id = $id";

$resultado = $db->query($stmt);

echo '<div class="my-3" style="padding-left: 15px">';

if ($resultado)
    echo "<p>Alumno actualizado correctamente.</p>";
else
    echo "<p>Error al actualizar los datos</p>";

echo '    <a href="listar.php" class="btn btn-secondary">Regresar al listado.</a>';
echo '</div>';

?>