<?php
     require_once '../BO/Venta.php';     
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
     
class Controlador_Venta {
   
    public static function Grabar_Venta()
    {
        $venta = new Venta();        
        $venta->setProducto_id($_POST['itCampoClave']);      
        $venta->setCliente_id($_POST['SlClientes']);     
        $venta->setCantidad($_POST['itCantidad']);  
        $venta->setMonto_recibido($_POST['itMonto_Cancelado']);   
        
        $controlador = Funciones::CrearControlador();
        $Resultado = $controlador->GrabarVenta($venta);
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Ventas.php");
        }        
        else 
        {
            $mensaje= MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
