<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Listar</title>
</head>

<body>
    <?php
    // Incluir la clase Alumno y procesar
    include "alumno.php";
    include "procesar.php";

    // Obtener los datos del alumno desde el formulario
    $correo = $_POST['email'];
    $nombre = $_POST['nombre'];
    $carnet = $_POST['carnet'];
    $edad = $_POST['edad'];
    $curso = $_POST['curso'];
    // $foto = $_FILES['foto'];
    
    $db = new mysqli("localhost", "root", "", "bdprueba");

    if ($db->connect_errno) {
        print "Error en la conexión " . $db->connect_errno;
        exit();
    }

    $stmt = "insert into alumnos(correo, nombre, carnet, edad, curso) value ('$correo', '$nombre', '$carnet', $edad, $curso)";

    $resultado = $db->query($stmt);


    echo '<div class="my-3" style="padding-left: 15px">';
    echo '    <a href="index.php" class="btn btn-secondary">Regresar a la página principal</a>';
    echo '</div>';

    ?>
    <!-- Agregar los scripts de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>