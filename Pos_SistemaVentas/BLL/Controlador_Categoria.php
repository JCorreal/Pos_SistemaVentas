<?php     
     require_once '../BO/Categoria.php';     
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
 
class Controlador_Categoria {
    
    public static function Grabar_Categoria()
    {
        $categoria = new Categoria();
        $categoria->setCategoria_id($_POST['itCampoClave']);
        $categoria->setNombre($_POST['itNombre']);             
        $controlador = Funciones::CrearControlador();
        $Resultado = $controlador->GrabarCategoria($categoria);
       
        if ($Resultado== 0)
        {
            header("Location: ../Vistas/Listado_Categorias.php");
        }
        elseif ($Resultado== 1)
        {
            $mensaje= MensajeExiste; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }
        else 
        {
            $mensaje= MensajeErrorBD; 
            header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");
        }          
    }
}
