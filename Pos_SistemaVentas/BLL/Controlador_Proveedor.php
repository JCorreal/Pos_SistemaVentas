<?php
     require_once '../BO/Proveedor.php';     
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
     
class Controlador_Proveedor {
   
    public static function Grabar_Proveedor()
    {
        $proveedor = new Proveedor();
        $proveedor->setProveedor_id($_POST['itCampoClave']);
        $proveedor->setNombre($_POST['itNombre']);      
        $proveedor->setContacto($_POST['itContacto']);        
        $proveedor->setDireccion($_POST['itDireccion']);
        $proveedor->setTelefono($_POST['itTelefono']);
        $proveedor->setObservacion(trim($_POST['itObservacion']));            
        $controlador = Funciones::CrearControlador();
        $Resultado = $controlador->GrabarProveedor($proveedor);
       
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Proveedores.php");
        }
        else 
        {
            $mensaje= MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
