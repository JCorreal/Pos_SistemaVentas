<?php


class Dao_Venta extends Dao_General implements IDao_Venta{
   
  public function grabarVenta($venta)
  { 
     $cn = Conexion::obtenerConexion();  
     try 
     {  
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_I_Ventas('" . $venta->getProducto_id() . "',
                                      '" . $venta->getCliente_id() . "',                                                                                                                                            
                                      '" . $venta->getCantidad() . "', 
                                      '" . $venta->getMonto_recibido() . "',           
                                      @result)");

        $res = $cn->query("SELECT @result AS result");
        $row = $res->fetch_assoc();
        mysqli_close($cn);        
        return $row['result'];          
     }
     catch (Exception $ex)
     {
        mysqli_close($cn);  
        echo $ex;
     }
  } 

  public function buscar()
  {
     $Lista = array();    
     $Lista =  parent::buscarDatoLista('tbl_ventas', '');
     return $Lista;
  }
    
  
  public function hacerPedido($datobuscar)
  {
     $Lista = array();    
     $Lista =  parent::buscarDatoLista('Venta', $datobuscar);
     return $Lista;
  }
    
  public function reporte($fechainicio, $fechafin)
  {
     $Lista = array();    
     $Lista =  parent::buscarDatoLista($fechainicio, $fechafin);
     return $Lista;
  }
}
