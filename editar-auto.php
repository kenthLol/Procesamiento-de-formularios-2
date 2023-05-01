<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Editar</title>
</head>

<body>
    <?php
    include "auto.php";

    $id = $_GET['id'];

    $db = new mysqli("localhost", "root", "", "bdprueba");

    if ($db->connect_errno) {
        print "Error en la conexión " . $db->connect_errno;
        exit();
    }

    $stmt = "select * from autos where id = $id";
    $result = $db->query($stmt);

    $auto = new Auto();


    if (mysqli_num_rows($result) > 0) {
        $array_autos = $result->fetch_assoc();
        $auto = new Auto(
            $array_autos['id'],
            $array_autos['placa'],
            $array_autos['modelo'],
            $array_autos['marca'],
            $array_autos['descripcion'],
        );
    }

    ?>
    <div style="padding-left: 32px">
        <h1>Editar</h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 80rem">
            <div class="card-body">
                <div class="container">
                    <h1>Autos</h1>
                    <p>Actualice los datos del estudiante: </p>
                    <form action="actualizar-auto.php?id=<?php echo $auto->id; ?>" method="POST"
                        ENCTYPE="multipart/form-data">
                        <div class="form-group col-12 col-md-6" style="display: none;">
                            <label for="id">Id:</label>
                            <input type="number" class="form-control" id="id" name="id"
                                value="<?php echo $auto->id; ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" class="form-control" id="email" name="correo"
                                value="<?php echo $auto->placa; ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="nombre">Nombre completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="200"
                                value="<?php echo $auto->modelo; ?>" required>
                        </div>
                        <div style="padding-left: 15px;">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3" style="padding-left: 35px">
        <a href="index.php" class="btn btn-secondary">Regresar a la página principal</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>