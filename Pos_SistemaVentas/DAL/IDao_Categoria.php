<?php
 
interface IDao_Categoria {
  
   public function obtenerCategoria($buscardato);   
   public function buscar($datobuscar);   
   public function grabarCategoria($categoria);  
   public function eliminarCategoria($datoEliminar);
}
