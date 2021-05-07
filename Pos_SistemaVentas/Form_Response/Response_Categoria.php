<?php     
      
class Response_Categoria {
    
    public static function grabar_Categoria()
    {
        $categoria = new Categoria();
        $categoria->setCategoria_id(trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT)));
        $categoria->setNombre(trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING)));   
      
        $controlador = Funciones::crearControlador_Categoria();
        $Resultado = $controlador->grabarCategoria($categoria);
       
        if ($Resultado == 0)
        {
            header("Location: ../Vistas/Listado_Categorias.php");
        }
        elseif ($Resultado == 1)
        {
            $mensaje = Mensajes::MensajeExiste; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }
        else 
        {
            $mensaje = Mensajes::MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }          
    }
}
