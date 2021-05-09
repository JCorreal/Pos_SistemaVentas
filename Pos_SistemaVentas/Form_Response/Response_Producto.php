<?php
    
class Response_Producto {
   
    public static function grabar_Producto()
    {
        $producto = new Producto();        
        $producto->setProducto_id(trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT)));   
        $producto->setCategoria_id(trim(filter_input(INPUT_POST, 'itCategoria', FILTER_SANITIZE_NUMBER_INT)));   
        $producto->setProveedor_id(trim(filter_input(INPUT_POST, 'itProveedor', FILTER_SANITIZE_NUMBER_INT))); 
        $producto->setNombre(trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING)));       
        $producto->setCantidad(trim(filter_input(INPUT_POST, 'itCantidad', FILTER_SANITIZE_NUMBER_INT)));   
        $producto->setPrecio_compra(trim(filter_input(INPUT_POST, 'itPrecio_Compra', FILTER_SANITIZE_NUMBER_INT)));   
        $producto->setPrecio_venta(trim(filter_input(INPUT_POST, 'itPrecio_Venta', FILTER_SANITIZE_NUMBER_INT)));    
        $controlador = Funciones::crearControlador_Producto();
        $Resultado = $controlador->grabarProducto($producto);
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Productos.php");
        }
        else 
        {
            $mensaje = Mensajes::MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
