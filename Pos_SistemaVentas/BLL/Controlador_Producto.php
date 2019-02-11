<?php
     require_once '../BO/Producto.php';     
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
     
class Controlador_Producto {
   
    public static function Grabar_Producto()
    {
        $producto = new Producto();        
        $producto->setProducto_id($_POST['itCampoClave']);        
        $producto->setCategoria_id($_POST['itCategoria']);     
        $producto->setProveedor_id($_POST['itProveedor']);  
        $producto->setNombre($_POST['itNombre']);        
        $producto->setCantidad($_POST['itCantidad']);
        $producto->setPrecio_compra($_POST['itPrecio_Compra']);
        $producto->setPrecio_venta($_POST['itPrecio_Venta']);       
        $controlador = Funciones::CrearControlador();
        $Resultado = $controlador->GrabarProducto($producto);
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Productos.php");
        }
        else 
        {
            $mensaje= MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }  
        
    }
}
