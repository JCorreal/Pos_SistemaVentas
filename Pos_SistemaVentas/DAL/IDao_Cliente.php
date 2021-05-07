<?php
 
interface IDao_Cliente {
    
    public function obtenerCliente($buscardato);   
    public function buscar($datobuscar);   
    public function grabarCliente($categoria);  
    public function eliminarCliente($datoEliminar);
}
