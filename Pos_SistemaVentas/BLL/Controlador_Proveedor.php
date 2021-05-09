<?php
    
class Controlador_Proveedor {
   
    protected $idao_proveedor;
        
    public function __construct(IDao_Proveedor $idao_proveedor)
    {
        $this->idao_proveedor = new Dao_Proveedor();
    }
        
    public function obtenerProveedor($datoBuscar)
    {
       return $this->idao_proveedor->obtenerProveedor($datoBuscar);
    }
    
    public function buscar($datobuscar)
    {
        return $this->idao_proveedor->buscar($datobuscar);
    }
    
    public function grabarProveedor ($object)
    {     
      return $this->idao_proveedor->grabarProveedor($object);
    }
         
    public function eliminarProveedor($datoBuscar){        
        return $this->idao_proveedor->eliminarProveedor($datoBuscar);
    }

     
}
