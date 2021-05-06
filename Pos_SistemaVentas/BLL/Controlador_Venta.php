<?php
     
class Controlador_Venta {
   
    protected $idao_venta;
    
    public function __construct(IDao_Venta $idao_venta)
    {
        $this->idao_venta = new Dao_Venta();
    }
    
    public function grabarVenta ($object)
    {     
      return $this->idao_venta->grabarVenta($object);
    }
    
    public function buscar() 
    {
        return $this->idao_venta->buscar();        
    }
    
    public function hacerPedido($datobuscar) 
    {
        return $this->idao_venta->hacerPedido($datobuscar);        
    }
    
    public function reporte($fechainicio, $fechafin)    
    {
        return $this->idao_venta->reporte($fechainicio, $fechafin);        
    }
    
    
}
