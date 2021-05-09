<?php

class Conexion {
    
 public static function obtenerConexion()
 {
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "PosDB"; 
    
    try
    {    
       $Connection = new mysqli($server, $username, $password, $database);
       if (mysqli_connect_errno())
       {
           die("No se puede conectar a la base de datos:");
       }
       else 
       {
          return($Connection);
       }         
    }
    catch (Exception $ex)
    { 
       echo $ex;     
    }
 }
}
