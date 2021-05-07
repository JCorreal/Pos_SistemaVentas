<?php

class Dao_Usuario implements IDao_Usuario{
   
  public function obtenerAcceso($username, $clave)
  {
    $result = NULL;  
    $cn = Conexion::obtenerConexion();
    try 
     {       
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

}
