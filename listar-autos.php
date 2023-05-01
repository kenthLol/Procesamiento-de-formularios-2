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
        <h2 class="my-3">Listado de Autos</h2>
        <div class="row">
            <div class="col-12  my-3">
                <div class="row border-top py-2">
                    <!-- <div class="col-4"><strong>Foto</strong></div> -->
                    <div class="col-8"><strong>Información</strong></div>
                </div>
                <?php
                include "auto.php";

                $db = new mysqli("localhost", "root", "", "bdprueba");

                if ($db->connect_errno) {
                    print "Error en la conexión " . $db->connect_errno;
                    exit();
                }

                $stmt = "select * from autos";
                $result = $db->query($stmt);

                $autos = array();

                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $auto_array = $result->fetch_assoc();
                    $autos[$i] = new Auto(
                        $auto_array['id'],
                        $auto_array['placa'],
                        $auto_array['modelo'],
                        $auto_array['marca'],
                        $auto_array['descripcion'],
                    );
                }

                foreach ($autos as $auto) {
                    ?>
                    <div class="row border-top py-3">
                        <div class="col-8">
                            <ul class="list-unstyled">
                                <li><strong>Placa:</strong>
                                    <?php echo $auto->placa; ?>
                                </li>
                                <li><strong>Modelo:</strong>
                                    <?php echo $auto->modelo; ?>
                                </li>
                                <li><strong>Marca:</strong>
                                    <?php echo $auto->marca; ?>
                                </li>
                                <li><strong>Descripcion:</strong>
                                    <?php echo $auto->descripcion; ?>
                                </li>
                            </ul>
                            <div class="btn-group">
                                <a href="editar-auto.php?id=<?php echo $auto->id ?>" class=" btn btn-primary">Editar</a>
                                <a href="eliminar-auto.php?id=<?php echo $auto->id ?>" class="btn btn-danger">Eliminar</a>
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