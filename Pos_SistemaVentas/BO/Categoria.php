<?php

class Categoria {
   
    private $categoria_id = 0;
    private $nombre;
    
    function __construct() {}  

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
