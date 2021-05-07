<?php
    
class Response_Venta {
   
    public static function grabar_Venta()
    {
        $venta = new Venta();        
        $venta->setProducto_id(trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT)));       
        $venta->setCliente_id(filter_input(INPUT_POST,'SlClientes'));        
        $venta->setCantidad(trim(filter_input(INPUT_POST, 'itCantidad', FILTER_SANITIZE_NUMBER_INT)));    
        $venta->setMonto_recibido(trim(filter_input(INPUT_POST, 'itMonto_Cancelado', FILTER_SANITIZE_NUMBER_INT)));  
        
        $controlador = Funciones::crearControlador_Venta();
        $Resultado = $controlador->grabarVenta($venta);
        if ($Resultado == 0)
        {
            header("Location: ../Vistas/Listado_Ventas.php");
        }        
        else 
        {
            $mensaje = Mensajes::MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
