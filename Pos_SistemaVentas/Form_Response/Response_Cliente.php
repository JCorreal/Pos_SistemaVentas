<?php
     require_once '../BO/Cliente.php';     
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
     session_start();
     
class Response_Cliente {
   
    public static function grabar_Cliente()
    {
        $cliente = new Cliente();
        $cliente->setCliente_id(trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT)));
        $cliente->setNombre(trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING)));       
        $cliente->setTelefono(trim(filter_input(INPUT_POST, 'itTelefono', FILTER_SANITIZE_STRING)));          
        $cliente->setDireccion(trim(filter_input(INPUT_POST, 'itDireccion', FILTER_SANITIZE_STRING)));   
        $cliente->setObservacion(trim(filter_input(INPUT_POST, 'itObservacion', FILTER_SANITIZE_STRING)));            
        $controlador = Funciones::crearControlador_Cliente();
        $Resultado = $controlador->grabarCliente($cliente);
       
        if ($Resultado == 0)
        {
            if ($_SESSION['PerfilAcceso'] == 1)
            {    
                header("Location: ../Vistas/Listado_Clientes.php");
            }
            else 
            {                               
                header("Location: ../Vistas/Listado_Ventas.php");
            }
            echo $_SESSION['PerfilAcceso'];
        }
        else 
        {
            $mensaje= Mensajes::MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
