<?php
   
class Controlador_Cliente {
   
    protected $idao_cliente;
        
    public function __construct(IDao_Cliente $idao_cliente)
    {
        $this->idao_cliente = new Dao_Cliente();
    }
        
    public function obtenerCliente($datoBuscar)
    {
       return $this->idao_cliente->obtenerCliente($datoBuscar);
    }
    
    public function buscar($datobuscar)
    {
        return $this->idao_cliente->buscar($datobuscar);
    }
    
    public function grabarCliente ($object)
    {     
      return $this->idao_cliente->grabarCliente($object);
    }
         
    public function eliminarCliente($datoBuscar){        
        return $this->idao_cliente->eliminarCliente($datoBuscar);
    }
}
