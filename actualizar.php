<?php
include "alumno.php";

$carnet = $_POST["carnet"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$edad = $_POST["edad"];
$curso = $_POST["curso"];
$foto = $_FILES["foto"];

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

$contenido = file_get_contents('archivoAlumnos');

$alumnos = unserialize($contenido);

// Buscar el objeto Alumno correspondiente al carnet que se desea actualizar
foreach ($alumnos as $key => $alumno) {
    if ($alumno->carnet == $carnet) {
        // Actualizar las propiedades del objeto con los datos del formulario
        $alumnos[$key]->nombre = $nombre;
        $alumnos[$key]->correo = $correo;
        $alumnos[$key]->edad = $edad;
        $alumnos[$key]->curso = $curso;

        // Si se cargó una nueva imagen, actualizar la propiedad "foto" del objeto Alumno
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            // // Eliminar la imagen anterior si existe
            // if (file_exists($alumnos[$key]->foto['full_path'])) {
            //     unlink($alumnos[$key]->foto['full_path']);
            // }
            // Actualizar la propiedad "foto" del objeto Alumno con la ubicación de la nueva imagen
            $alumnos[$key]->foto = $foto;
        }

        // Volver a serializar el array de objetos Alumno y guardar en el archivo
        $contenido = serialize($alumnos);
        file_put_contents('archivoAlumnos', $contenido);

        // Redirigir al usuario a la página de listado de alumnos
        header("Location: listar.php");
        exit();
    }
}

echo '<div class="my-3" style="padding-left: 15px">';
echo '<p>Alumno actualizado</p>';
echo '    <a href="index.php" class="btn btn-secondary">Regresar a la página principal</a>';
echo '</div>';

?>