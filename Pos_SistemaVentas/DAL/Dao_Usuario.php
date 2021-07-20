<?php

class Dao_Usuario implements IDao_Usuario{
   
  public function obtenerAcceso($username, $clave)
  {
    $result = NULL;  
    $cn = Conexion::obtenerConexion();
    try 
     {       
        $rs= $cn->query("CALL SPR_R_Acceso('" . $username . "', '" . $clave . "')");        
        $fila = $rs->fetch_row();
        $result = $fila[0];  
        mysqli_free_result($rs);
        mysqli_close($cn);       
        return $result; 
     }
     catch (Exception $ex)
     {
        mysqli_close($cn);  
        echo $ex;
     }  
  }

}
