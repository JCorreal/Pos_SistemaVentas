<?php
 
class Dao_Cliente extends Dao_General implements IDao_Cliente{
    
  public function obtenerCliente($buscardato)
  { 
    try
    {
       $vecr = parent::buscarRegistro('tbl_Clientes', $buscardato);
       if ($vecr!= NULL)
       {
         $cliente = new Cliente();
         $cliente->setCliente_id($vecr[0][0]);
         $cliente->setNombre($vecr[0][1]);
         $cliente->setTelefono($vecr[0][2]);
         $cliente->setDireccion($vecr[0][3]);  
         $cliente->setObservacion($vecr[0][4]);  
         unset($vecr);
         return $cliente;
       }
       else
       {
          return NULL;
       }
   }
   catch (Exception $ex)
   {
       echo $ex;
   }      
  }
    public function grabarCliente($cliente)
  { 
     $cn = Conexion::obtenerConexion();    
     try 
     {        
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_IU_Clientes('" . $cliente->getCliente_id () . "',
                                         '" . $cliente->getNombre() . "',
                                         '" . $cliente->getTelefono() . "', 
                                         '" . $cliente->getDireccion() . "', 
                                         '" . $cliente->getObservacion() . "',                                                                          
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
  
  public function buscar($buscardato)
  {
     $Lista = array();    
     $Lista =  parent::buscarDatoLista('tbl_Clientes', $buscardato);
     return $Lista;
  }
    public function eliminarCliente($datoEliminar) {
      $result = parent::EliminarRegistro("tbl_Clientes", $datoEliminar);
      return $result;  
    }

}
