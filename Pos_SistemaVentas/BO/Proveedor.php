<?php

class Proveedor {
    private $proveedor_id = 0;
    private $nombre;
    private $contacto;
    private $direccion;
    private $telefono;
    private $observacion;
    
    public function __construct(){}
    
    function getProveedor_id() {
        return $this->proveedor_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setProveedor_id($proveedor_id) {
        $this->proveedor_id = $proveedor_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }


}
