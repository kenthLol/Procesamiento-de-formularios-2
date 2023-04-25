<?php
class Alumno
{
    public $id;
    public $correo;
    public $nombre;
    public $carnet;
    public $edad;
    public $curso;
    public $foto;
    public function __construct(
        $arg_id = "",
        $arg_correo = "",
        $arg_nombre = "",
        $arg_carnet = "",
        $arg_edad = "",
        $arg_curso = "",
        $arg_foto = ""
    ) {
        $this->id = $arg_id;
        $this->correo = $arg_correo;
        $this->nombre = $arg_nombre;
        $this->carnet = $arg_carnet;
        $this->edad = $arg_edad;
        $this->curso = $arg_curso;
        $this->foto = $arg_foto;
    }

    public function imprimir()
    {
        echo "Id: $this->id <br/>";
        echo "Correo Electrónico: $this->correo <br/>";
        echo "Nombre: $this->nombre <br/>";
        echo "Número de Carnet: $this->carnet <br/>";
        echo "Edad: $this->edad <br/>";
        echo "Curso Actual: $this->curso <br/>";
        echo "Foto: $this->foto <br/>";
    }

    function __destruct()
    {

    }
}

?>