<?php
   
class Controlador_Producto {
    
    protected $idao_producto;
        
    public function __construct(IDao_Producto $idao_producto)
    {
        $this->idao_producto = new Dao_Producto();
    }
        
    public function obtenerProducto($datoBuscar)
    {
       return $this->idao_producto->obtenerProducto($datoBuscar);
    }
    
    public function cargarCombos()
    {
        return $this->idao_producto->CargarCombos();
    }
    
    public function buscar($datobuscar)
    {
        return $this->idao_producto->buscar($datobuscar);
    }
    
    public function grabarProducto ($object)
    {     
      return $this->idao_producto->grabarProducto($object);
    }
         
    public function eliminarProducto($datoBuscar){        
        return $this->idao_producto->eliminarProducto($datoBuscar);
    }
    
}
