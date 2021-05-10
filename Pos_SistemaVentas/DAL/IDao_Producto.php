<?php
 
interface IDao_Producto {
   
    public function obtenerProducto($buscardato);   
    public function buscar($datobuscar);   
    public function grabarProducto($categoria);  
    public function cargarCombos();
    public function eliminarProducto($datoEliminar);
}
