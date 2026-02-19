<?php

class Producto {

    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $activo;

    public function __construct($nombre, $precio, $stock, $activo) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->activo = $activo;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function getPrecio(){
        return $this->precio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getActivo(){
        return $this->activo;
    }

}

?>