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

$fecha_actual = date('Y-m-d');

// Concatenar el nombre de usuario y la fecha actual, separados por un guion bajo
$nuevo_nombre_archivo = $nombre . '_' . $fecha_actual . '.jpg';
$foto['name'] = $nuevo_nombre_archivo;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $archivo_temporal = $_FILES['foto']['tmp_name'];
    $ubicacion_archivo = 'images/' . $nuevo_nombre_archivo;
    $foto['full_path'] = $ubicacion_archivo;
    if (move_uploaded_file($archivo_temporal, $ubicacion_archivo)) {
        $message = "El archivo se ha guardado correctamente en " . $ubicacion_archivo;
        error_log($message, 0);
    } else {
        error_log("Error al cargar el archivo", 1);
    }
}

$stmt = "select foto from alumnos where id = $id";
$resultado = $db->query($stmt);
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $foto_anterior = $row['foto'];
}

$stmt = "update alumnos set
                nombre = '$nombre',
                carnet = '$carnet',
                edad = '$edad',
                correo = '$correo' ,
                curso = '$curso',
                foto = '$ubicacion_archivo'
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