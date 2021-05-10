<?php

class Cliente {
    private $cliente_id = 0;
    private $nombre;
    private $telefono;
    private $direccion;
    private $observacion;
    
    function __construct() {}      

    function getCliente_id() {
        return $this->cliente_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }


}
