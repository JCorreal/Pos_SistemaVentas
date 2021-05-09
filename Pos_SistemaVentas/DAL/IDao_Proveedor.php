<?php
 
interface IDao_Proveedor {
    
    public function obtenerProveedor($buscardato);   
    public function buscar($datobuscar);   
    public function grabarProveedor($categoria);  
    public function eliminarProveedor($datoEliminar);
}
