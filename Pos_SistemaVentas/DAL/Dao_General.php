<?php

class Dao_General {
   
  public static function buscarRegistro($tabla, $buscardato)
  {
     $cn = Conexion::obtenerConexion();  
     try 
     {                 
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
  
          
  public function buscarDatoLista($tabla, $buscardato)
  {
    $cn = Conexion::obtenerConexion();   
    $ListaElementos = array();    
    try
    {       
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
  
  public function poblarCombos($tabla)
  { 
    $resultado1=null;
    $resultado2=null;     
    $resultado3=null;    
    $cn = Conexion::obtenerConexion();   
    try
    {
      $RefCAllSp = $cn->prepare('CALL SPR_R_CargarCombos(?)');
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
  
  public function eliminarRegistro($tabla, $datobuscar)
  {
   $cn = Conexion::obtenerConexion();      
   try
   {           
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
