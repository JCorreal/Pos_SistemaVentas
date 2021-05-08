<?php

class Funciones {
         
   public static function crearControlador_Categoria()
   {
        $dao_categoria = new Dao_Categoria();
        $dao_categoria = AccesoDatosFactory::obtenerDao_Categoria($dao_categoria);       
        return new Controlador_Categoria($dao_categoria);
   }
   
   public static function crearControlador_Cliente()
   {
        $dao_cliente = new Dao_Cliente();
        $dao_cliente = AccesoDatosFactory::obtenerDao_Cliente($dao_cliente);       
        return new Controlador_Cliente($dao_cliente);
   }
   
   public static function crearControlador_Producto()
   {
        $dao_producto = new Dao_Producto();
        $dao_producto = AccesoDatosFactory::obtenerDao_Producto($dao_producto);       
        return new Controlador_Producto($dao_producto);
   }
    
   public static function crearControlador_Proveedor()
   {
        $dao_proveedor = new Dao_Proveedor();
        $dao_proveedor = AccesoDatosFactory::obtenerDao_Proveedor($dao_proveedor);       
        return new Controlador_Proveedor($dao_proveedor);
   }
   
   public static function crearControlador_Usuario()
   {
        $dao_usuario = new Dao_Usuario();
        $dao_usuario = AccesoDatosFactory::obtenerDao_Usuario($dao_usuario);       
        return new Controlador_Usuario($dao_usuario);
   }
   
   public static function crearControlador_Venta()
   {
        $dao_venta = new Dao_Venta();
        $dao_venta = AccesoDatosFactory::obtenerDao_Venta($dao_venta);       
        return new Controlador_Venta($dao_venta);
   }
   
   public static function validar_CampoRequerido($Cadena)
   {
     $vacio = FALSE;
     if (empty(trim($Cadena)))  // Validar Campo en blanco
     {
        $vacio = TRUE;
     }
     return $vacio;
   } 
   
    public static function validar_SoloNumeros($cadena)
    {
        $respuesta = FALSE;  
        if (!preg_match("/^[0-9]+$/", $cadena))
        {
           $respuesta = TRUE;
        }
        return $respuesta;
    }
    
    public static function validar_Longitud($cadena)
    { // Aceptar sólo 7 dígitos para teléfonos fijos y 10 para celulares
        $respuesta = FALSE;  
        if ((strlen($cadena) != 7) && (strlen($cadena) != 10))
        {
            $respuesta = TRUE;
        }        
        return $respuesta;
    }  
    
   public static function validar_PrimeraPosicion($cadena)
   {
        $respuesta = FALSE;   
        if(substr($cadena,0,1) == 0)
        {
           $respuesta = TRUE;
        }     
        return $respuesta;
   }
}

