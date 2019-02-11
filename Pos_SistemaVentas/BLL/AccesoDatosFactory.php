<?php
     require_once '../DAL/AccesoDatos.php';     
     require_once '../DAL/IAccesoDatos.php';     

class AccesoDatosFactory {
    
    public static function ObtenerAccesoDatos(IAccesoDatos $iaccesodatos)
    {
        return new AccesoDatos();
    }
    
    
}
