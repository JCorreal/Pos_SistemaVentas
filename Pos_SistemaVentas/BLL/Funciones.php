<?php
     require_once '../BLL/Controlador.php';
     require_once '../BLL/AccesoDatosFactory.php';
     
class Funciones {
   
   public static function CrearControlador()
   {
        $accesodatos = new AccesoDatos();
        $accesodatos = AccesoDatosFactory::ObtenerAccesoDatos($accesodatos);       
        return new Controlador($accesodatos);
    }
    
    
   public static function Validar_CampoVacio($Cadena)
   {
     $vacio = FALSE;
     if (empty(trim($Cadena)))  // Validar Campo en blanco
     {
        $vacio = TRUE;
     }
     return $vacio;
   } 
}

