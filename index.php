<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Formulario</title>
</head>

<body>
    <main>
        <header>
            <h1>Practica3 - Formularios</h1>
        </header>
        <section class="content">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Formulario Alumnos
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="container">
                                <h1>Alumnos</h1>
                                <p>Llene el formulario con los datos del estudiante:</p>

                                <form action="registrar.php" method="POST" ENCTYPE="multipart/form-data">
                                    <div class="form-group col-12 col-md-6" style="display: none;">
                                        <label for="id">Id:</label>
                                        <input type="number" class="form-control" id="id" name="id"
                                            placeholder="Ingrese su correo" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="email">Correo electrónico:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Ingrese su correo" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="nombre">Nombre completo:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            maxlength="200" placeholder="Ingrese su nombre completo" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="carnet">Número de carnet:</label>
                                        <input type="text" class="form-control" id="carnet" name="carnet" maxlength="10"
                                            placeholder="Ingrese su carnet" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="edad">Edad (entre 15 - 50):</label>
                                        <input type="number" class="form-control" id="edad" name="edad" min="15"
                                            max="50" placeholder="Edad" required pattern="[1-4][5-9]|[2-4][0-9]|50">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="curso">Curso actual (entre 1 - 5):</label>
                                        <input type="text" class="form-control" id="curso" name="curso" min="1" max="5"
                                            placeholder="Ingrese el curso actual" required pattern="[1-5]">
                                    </div>
                                    <!-- <div class="form-group col-12 col-md-6">
                                        <label for="foto">Foto:</label>
                                        <input type="file" class="form-control-file" id="foto" name="foto" required>
                                    </div> -->
                                    <div style="padding-left: 15px;">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Listado Alumnos
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div style="padding-left: 15px;">
                                <a href="listar.php" class="btn btn-primary">Ver Listados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>