<?php
     require_once '../BO/Cliente.php';     
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
     
class Controlador_Cliente {
   
    public static function Grabar_Cliente()
    {
        $cliente = new Cliente();
        $cliente->setCliente_id($_POST['itCampoClave']);
        $cliente->setNombre($_POST['itNombre']);      
        $cliente->setTelefono($_POST['itTelefono']);        
        $cliente->setDireccion($_POST['itDireccion']);
        $cliente->setObservacion(trim($_POST['itObservacion']));            
        $controlador = Funciones::CrearControlador();
        $Resultado = $controlador->GrabarCliente($cliente);
       
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Clientes.php");
        }
        else 
        {
            $mensaje= MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
