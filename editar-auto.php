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
    include "alumno.php";

    $idAlumno = $_GET['id'];

    $db = new mysqli("localhost", "root", "", "bdprueba");

    if ($db->connect_errno) {
        print "Error en la conexión " . $db->connect_errno;
        exit();
    }

    $stmt = "select * from alumnos where id = $idAlumno";
    $result = $db->query($stmt);

    $alumno = new Alumno();

    if (mysqli_num_rows($result) > 0) {
        $array_alumnos = $result->fetch_assoc();
        $alumno = new Alumno(
            $array_alumnos['id'],
            $array_alumnos['correo'],
            $array_alumnos['nombre'],
            $array_alumnos['carnet'],
            $array_alumnos['edad'],
            $array_alumnos['curso'],
            null
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
                    <h1>Alumnos</h1>
                    <p>Actualice los datos del estudiante: </p>
                    <form action="actualizar.php?id=<?php echo $alumno->id; ?>" method="POST"
                        ENCTYPE="multipart/form-data">
                        <div class="form-group col-12 col-md-6" style="display: none;">
                            <label for="id">Id:</label>
                            <input type="number" class="form-control" id="id" name="id"
                                value="<?php echo $alumno->id; ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" class="form-control" id="email" name="correo"
                                value="<?php echo $alumno->correo; ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="nombre">Nombre completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="200"
                                value="<?php echo $alumno->nombre; ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="carnet">Número de carnet:</label>
                            <input type="text" class="form-control" id="carnet" name="carnet" maxlength="10"
                                value="<?php echo $alumno->carnet; ?>" readonly>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="edad">Edad (entre 15 - 50):</label>
                            <input type="number" class="form-control" id="edad" name="edad" min="15" max="50"
                                value="<?php echo $alumno->edad; ?>" required pattern="[1-4][5-9]|[2-4][0-9]|50">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="curso">Curso actual (entre 1 - 5)</label>
                            <input type="text" class="form-control" id="curso" name="curso"
                                value="<?php echo $alumno->curso; ?>" required pattern="[1-5]">
                        </div>
                        <!-- <div class="form-group col-12 col-md-6">
                            <label for="foto">Foto:</label>
                            <div class="photo-preview">
                                <img id="photo-preview" src="<?php echo $alumno->foto['full_path']; ?>"
                                    alt="Foto de <?php echo $alumno->nombre; ?>">
                            </div>
                            <input type="file" class="form-control-file" id="foto" name="foto"
                                onchange="previewPhoto()">
                        </div> -->
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

    <!-- <script>
        function previewPhoto() {
            const photoInput = document.getElementById("foto");
            const photoPreview = document.getElementById("photo-preview");
            const file = photoInput.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                photoPreview.setAttribute("src", e.target.result);
            }
            reader.readAsDataURL(file);
        }
    </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>