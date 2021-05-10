<?php
 
class Dao_Proveedor extends Dao_General implements IDao_Proveedor{
   
  const Source_Proveedores =  'tbl_Proveedores'; 
  
  public function obtenerProveedor($buscardato)
  { 
    try
    {
       $vecr = parent::buscarRegistro(Dao_Proveedor::Source_Proveedores, $buscardato);
       if ($vecr!= NULL)
       {
         $proveedor = new Proveedor();
         $proveedor->setProveedor_id($vecr[0][0]);
         $proveedor->setNombre($vecr[0][1]);
         $proveedor->setContacto($vecr[0][2]);
         $proveedor->setDireccion($vecr[0][3]);  
         $proveedor->setTelefono($vecr[0][4]);  
         $proveedor->setObservacion($vecr[0][5]);  
         unset($vecr);
         return $proveedor;
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
    
  public function grabarProveedor($proveedor)
  { 
     $cn = Conexion::obtenerConexion();   
     try 
     {                   
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_IU_Proveedores('" . $proveedor->getProveedor_id () . "',
                                            '" . $proveedor->getNombre() . "',
                                            '" . $proveedor->getContacto() . "', 
                                            '" . $proveedor->getDireccion() . "', 
                                            '" . $proveedor->getTelefono() . "', 
                                            '" . $proveedor->getObservacion() . "',                                                                          
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
     $Lista =  parent::buscarDatoLista(Dao_Proveedor::Source_Proveedores, $buscardato);
     return $Lista;
    }
 
    public function eliminarProveedor($datoEliminar) 
    {
      $result = parent::eliminarRegistro(Dao_Proveedor::Source_Proveedores, $datoEliminar);
      return $result;  
    }
}
