<?php

class Producto {
    private $producto_id = 0;
    private $categoria_id;
    private $proveedor_id;
    private $nombre;
    private $cantidad;
    private $precio_compra;
    private $precio_venta;
    
    public function __construct(){}
    
    function getProducto_id() {
        return $this->producto_id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getProveedor_id() {
        return $this->proveedor_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio_compra() {
        return $this->precio_compra;
    }

    function getPrecio_venta() {
        return $this->precio_venta;
    }

    function setProducto_id($producto_id) {
        $this->producto_id = $producto_id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setProveedor_id($proveedor_id) {
        $this->proveedor_id = $proveedor_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio_compra($precio_compra) {
        $this->precio_compra = $precio_compra;
    }

    function setPrecio_venta($precio_venta) {
        $this->precio_venta = $precio_venta;
    }


}
