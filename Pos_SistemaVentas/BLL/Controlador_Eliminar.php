<?php 
     require_once '../BLL/Funciones.php';
     require_once '../BLL/Mensajes.php';
     
     $dato = $_GET['id'];
     $tabla = $_GET['tabla'];

     $controlador = Funciones::CrearControlador();
     $Resultado = $controlador->EliminarRegistro($tabla, $dato);

     if ($Resultado== 0)
     {
        if ($tabla == 'tbl_Clientes') 
        {
          header("Location: ../Vistas/Listado_Clientes.php");
        }
        else if ($tabla == 'tbl_Proveedores') 
        {
          header("Location: ../Vistas/Listado_Proveedores.php");
        }
        else if ($tabla == 'tbl_Productos') 
        {
          header("Location: ../Vistas/Listado_Productos.php");
        }
        else if ($tabla == 'tbl_Categorias') 
        {
          header("Location: ../Vistas/Listado_Categorias.php");
        }
     }
     elseif ($Resultado == 1)
     {
         $mensaje= MensajeRegistroRelacionado;
         header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");            
     }
     else 
     {
        $mensaje= MensajeErrorBD; 
        header("Location: ../Vistas/Repuesta.php?respuesta=E&mensaje=$mensaje");
     }  
