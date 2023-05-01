<?php
class Auto
{
  public $id;
  public $placa;
  public $modelo;
  public $marca;
  public $descripcion;

  public function __construct($id, $placa, $modelo, $marca, $descripcion)
  {
    $this->id = $id;
    $this->placa = $placa;
    $this->modelo = $modelo;
    $this->marca = $marca;
    $this->descripcion = $descripcion;
  }
  public function imprimir()
  {
    echo "Id: $this->id <br/>";
    echo "Placa: $this->placa <br/>";
    echo "Modelo: $this->modelo <br/>";
    echo "Marca: $this->marca <br/>";
    echo "Descripción: $this->descripcion <br/>";
  }
}



?>