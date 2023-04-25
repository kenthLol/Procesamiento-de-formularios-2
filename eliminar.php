<?php
// Incluir la clase Alumno
include "alumno.php";

// Obtener el carnet del alumno a eliminar de la URL
$carnet = $_GET["carnet"];

// Cargar los datos serializados de los alumnos en un array de objetos Alumno
$contenido = file_get_contents('archivoAlumnos');
$alumnos = unserialize($contenido);

// Recorrer el array y buscar el objeto Alumno que tenga el carnet a eliminar
foreach ($alumnos as $key => $alumno) {
    if ($alumno->carnet == $carnet) {
        // Eliminar el objeto Alumno del array
        unset($alumnos[$key]);

        // Volver a serializar el array de objetos Alumno y guardar en el archivo
        $contenido = serialize($alumnos);
        file_put_contents('archivoAlumnos', $contenido);

        // Redirigir al usuario a la página de listado de alumnos
        header("Location: listar.php");
        exit();
    }
}
// Si no se encontró el alumno a eliminar, redirigir al usuario a la página de listado de alumnos
header("Location: listar.php");
exit();
?>