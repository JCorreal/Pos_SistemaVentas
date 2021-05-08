<?php

class Venta {
    private $producto_id;
    private $cliente_id;   
    private $cantidad;   
    private $monto_recibido;
    
    function __construct() {}
    
    function getProducto_id() {
        return $this->producto_id;
    }

    function getCliente_id() {
        return $this->cliente_id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getMonto_recibido() {
        return $this->monto_recibido;
    }

    function setProducto_id($producto_id) {
        $this->producto_id = $producto_id;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setMonto_recibido($monto_recibido) {
        $this->monto_recibido = $monto_recibido;
    }



}
