<?php
    
class Response_Proveedor {
   
    public static function grabar_Proveedor()
    {
        $proveedor = new Proveedor();
        $proveedor->setProveedor_id(trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT))); 
        $proveedor->setNombre(trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING)));       
        $proveedor->setContacto(trim(filter_input(INPUT_POST, 'itContacto', FILTER_SANITIZE_STRING)));       
        $proveedor->setDireccion(trim(filter_input(INPUT_POST, 'itDireccion', FILTER_SANITIZE_STRING)));  
        $proveedor->setTelefono(trim(filter_input(INPUT_POST, 'itTelefono', FILTER_SANITIZE_STRING)));  
        $proveedor->setObservacion(trim(filter_input(INPUT_POST, 'itObservacion', FILTER_SANITIZE_STRING)));                
        $controlador = Funciones::CrearControlador_Proveedor();
        $Resultado = $controlador->grabarProveedor($proveedor);
       
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Proveedores.php");
        }
        else 
        {
            $mensaje = Mensajes::MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
