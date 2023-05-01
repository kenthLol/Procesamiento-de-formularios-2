<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Listar autos</title>
</head>

<body>
    <?php
    // Incluir la clase auto y procesar
    include "auto.php";

    // Obtener los datos del auto desde el formulario
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $descripcion = $_POST['descripcion'];

    $db = new mysqli("localhost", "root", "", "bdprueba");

    if ($db->connect_errno) {
        print "Error en la conexión " . $db->connect_errno;
        exit();
    }

    $stmt = "insert into autos(placa, modelo, marca, descripcion) value ('$placa', '$modelo', '$marca', '$descripcion')";

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