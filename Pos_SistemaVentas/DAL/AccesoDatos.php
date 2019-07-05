<?php
     require_once '../DAL/Conexion.php';
     require_once '../DAL/IAccesoDatos.php';

class AccesoDatos implements IAccesoDatos{
    
  public function ObtenerAcceso($username, $clave)
  {
    $result = NULL;  
    try 
     {                   
        $cn = Conexion::ObtenerConexion();
        $rs= $cn->query("CALL SPR_R_Acceso('" . $username . "', '" . $clave . "')");
        $vecresultado = array(); 
        while ($fila = $rs->fetch_row()) {
               array_push($vecresultado, $fila);                
        }
        mysqli_free_result($rs);
        mysqli_close($cn);
        if ($vecresultado != NULL)
        {
          $result =  $vecresultado[0][0];
        }
        return $result; 
     }
     catch (Exception $ex)
     {
        mysqli_close($cn);  
        echo $ex;
     }  
  }
  
  public static function BuscarRegistro($tabla, $buscardato)
  {
     try 
     {                 
        $cn = Conexion::ObtenerConexion();  
        $rs= $cn->query("CALL SPR_R_BuscarRegistro('" . $tabla . "', '" . $buscardato . "')");
        $vecresultado = array(); 
        while ($fila = $rs->fetch_row()) {
               array_push($vecresultado, $fila);                
        }
        mysqli_free_result($rs);
        mysqli_close($cn);
        return $vecresultado;
     }
     catch (Exception $ex)
     { 
       mysqli_close($cn);
       echo $ex;     
     }
  }
  
          
  public function BuscarDatoLista($tabla, $buscardato)
  {
    $ListaElementos = array();    
    try
    {
      $cn = Conexion::ObtenerConexion();  
      $rs= $cn->query("CALL SPR_R_Consultas('" . $tabla . "',  '" . $buscardato . "')");          
      while ($fila = $rs->fetch_row())
      {
         array_push($ListaElementos, $fila);                
      }
      mysqli_free_result ($rs);
      mysqli_close($cn);
      return  $ListaElementos;    
    }
    catch (Exception $ex)
    { 
       mysqli_close($cn); 
       echo $ex;     
    }
  }
  
  public function CargarCombos($tabla)
  { 
    $resultado1=null;
    $resultado2=null;     
    $resultado3=null;     
    try
    {
      $cn = Conexion::ObtenerConexion();
      $RefCAllSp = $cn->prepare('CALL SPR_R_CargarCombosListas(?)');
      $RefCAllSp->bind_param("s", $tabla);
      $RefCAllSp->execute();      
      $RefCAllSp->bind_result($resultado1, $resultado2, $resultado3); 
      $ListaElementos = array();
      while ($RefCAllSp->fetch())
      {  
           array_push($ListaElementos, $resultado3);  
           array_push($ListaElementos, $resultado1);
           array_push($ListaElementos, $resultado2);
      }
         mysqli_stmt_close ($RefCAllSp);
         mysqli_close($cn);      
         return $ListaElementos;
    }
    catch (Exception $ex)
    { 
       mysqli_close($cn); 
       echo $ex;     
    } 
  }
    
  public function ObtenerProveedor($buscardato)
  { 
    try
    {
       $vecr = AccesoDatos::BuscarRegistro('tbl_Proveedores', $buscardato);
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
  
  public function ObtenerProducto($buscardato)
  { 
    try
    {
       $vecr = AccesoDatos::BuscarRegistro('tbl_Productos', $buscardato);
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
  
  public function ObtenerCliente($buscardato)
  { 
    try
    {
       $vecr = AccesoDatos::BuscarRegistro('tbl_Clientes', $buscardato);
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
  
  public function ObtenerCategoria($buscardato)
  {  
    try
    {
       $vecr = AccesoDatos::BuscarRegistro('tbl_Categorias', $buscardato);
       if ($vecr!= NULL)
       {
         $categoria = new Categoria();
         $categoria->setCategoria_id($vecr[0][0]);
         $categoria->setNombre($vecr[0][1]);
         unset($vecr);
         return $categoria;
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

  public function GrabarCategoria($categoria)
  {          
     try
     {             
        $cn = Conexion::ObtenerConexion(); 
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_IU_Categorias('" . $categoria->getCategoria_id() . "', 
                                          '" . $categoria->getNombre() . "',                                            
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
  
  public function GrabarProveedor($proveedor)
  { 
     try 
     {                   
        $cn = Conexion::ObtenerConexion(); 
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
  
  public function GrabarCliente($cliente)
  { 
     try 
     {                   
        $cn = Conexion::ObtenerConexion(); 
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
  
  public function GrabarProducto($producto)
  { 
     try 
     {                   
        $cn = Conexion::ObtenerConexion(); 
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
  
  
  public function GrabarVenta($sale)
  { 
     try 
     {                   
        $cn = Conexion::ObtenerConexion(); 
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_I_Ventas('" . $sale->getProducto_id() . "',
                                    '" . $sale->getCliente_id() . "',                                                                                                                                            
                                    '" . $sale->getCantidad() . "', 
                                    '" . $sale->getMonto_recibido() . "',           
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
  
  public function EliminarRegistro($tabla, $datobuscar)
  {
   try
   {   
      $cn = Conexion::ObtenerConexion();     
      $cn->query("SET @result = 1");
      $cn->query("CALL SPR_D_EliminarRegistro('" . $tabla . "', '" . $datobuscar . "',  @result)");
   
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
  
  
}
