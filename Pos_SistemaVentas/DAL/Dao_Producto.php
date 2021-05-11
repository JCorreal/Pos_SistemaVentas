<?php
 
class Dao_Producto extends Dao_General implements IDao_Producto{
    
  const Source_Productos =  'tbl_Productos';       
  
  public function obtenerProducto($buscardato)
  { 
    try
    {
       $vecr = parent::buscarRegistro(Dao_Producto::Source_Productos, $buscardato);
       if ($vecr!= NULL)
       {
         $producto = new Producto();
         $producto->setProducto_id($vecr[0][0]);
         $producto->SetCategoria_id($vecr[0][1]);
         $producto->SetProveedor_id($vecr[0][2]);
         $producto->SetNombre($vecr[0][3]);
         $producto->setCantidad($vecr[0][4]);  
         $producto->setPrecio_compra($vecr[0][5]);  
         $producto->setPrecio_venta($vecr[0][6]);  
         unset($vecr);
         return $producto;
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

  public function grabarProducto($producto)
  { 
     $cn = Conexion::obtenerConexion();   
     try 
     {                   
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_IU_Productos('" . $producto->getProducto_id() . "',
                                          '" . $producto->getCategoria_id() . "',                                                                        
                                          '" . $producto->getProveedor_id() . "',
                                          '" . $producto->getNombre() . "', 
                                          '" . $producto->getCantidad() . "', 
                                          '" . $producto->getPrecio_compra() . "', 
                                          '" . $producto->getPrecio_venta() . "',          
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
     $Lista =  parent::buscarDatoLista(Dao_Producto::Source_Productos, $buscardato);
     return $Lista;
  }
  
  public function cargarCombos()
  {
     $Lista = array();    
     $Lista =  parent::poblarCombos(Dao_Producto::Source_Productos);
     return $Lista;
  }
   
  public function eliminarProducto($datoEliminar)
  {
      $result = parent::eliminarRegistro(Dao_Producto::Source_Productos, $datoEliminar);
      return $result;  
  }

}
