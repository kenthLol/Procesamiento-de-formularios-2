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
    <div class="container ">
        <h2 class="my-3">Listado de Alumnos</h2>
        <div class="row">
            <div class="col-12  my-3">
                <div class="row border-top py-2">
                    <div class="col-4"><strong>Foto</strong></div>
                    <div class="col-8"><strong>Información</strong></div>
                </div>
                <?php
                include "alumno.php";

                $db = new mysqli("localhost", "root", "", "bdprueba");

                if ($db->connect_errno) {
                    print "Error en la conexión " . $db->connect_errno;
                    exit();
                }

                $stmt = "select * from alumnos";
                $result = $db->query($stmt);

                $alumnos = array();

                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $array_alumno = $result->fetch_assoc();
                    $alumnos[$i] = new Alumno(
                        $array_alumno['id'],
                        $array_alumno['correo'],
                        $array_alumno['nombre'],
                        $array_alumno['carnet'],
                        $array_alumno['edad'],
                        $array_alumno['curso'],
                        null
                    );
                }

                foreach ($alumnos as $alumno) {
                    ?>
                    <div class="row border-top py-3">
                        <div class="col-4">
                            <img src="<?php echo $alumno->foto['full_path']; ?>"
                                class="img-fluid img-thumbnail d-flex custom-img mx-auto my-2 custom-img"
                                style="width: 120px; height: 120px" alt="Foto de <?php echo $alumno->nombre; ?>">
                        </div>
                        <div class="col-8">
                            <ul class="list-unstyled">
                                <li><strong>No. de carnet:</strong>
                                    <?php echo $alumno->carnet; ?>
                                </li>
                                <li><strong>Nombre:</strong>
                                    <?php echo $alumno->nombre; ?>
                                </li>
                                <li><strong>Correo electrónico:</strong>
                                    <?php echo $alumno->correo; ?>
                                </li>
                                <li><strong>Edad:</strong>
                                    <?php echo $alumno->edad; ?>
                                </li>
                                <li><strong>Curso actual:</strong>
                                    <?php echo $alumno->curso; ?>
                                </li>
                            </ul>
                            <div class="btn-group">
                                <a href="editar.php?id=<?php echo $alumno->id ?>" class=" btn btn-primary">Editar</a>
                                <a href="eliminar.php?id=<?php echo $alumno->id ?>" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="my-3">
            <a href="index.php" class="btn btn-secondary">Regresar a la página principal</a>
        </div>
    </div>

    <!-- Agregar los scripts de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>