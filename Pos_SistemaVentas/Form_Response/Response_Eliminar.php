<?php
        require_once '../BLL/AutoLoader.php';
        spl_autoload_register();

        $id = base64_decode(filter_input(INPUT_GET, 'id'), FILTER_SANITIZE_NUMBER_INT);                 
        $tabla = (filter_input(INPUT_GET, 'accion'));
        
        $Resultado = -1;             
        if ($tabla == '1') // TBL_CATEGORIAS
        {
            $controlador = Funciones::crearControlador_Categoria();
            $Resultado = $controlador->eliminarCategoria($id);
            if ($Resultado == 0)
            {
                 header("Location: ../Vistas/Listado_Categorias.php");                              
            }
            elseif ($Resultado == 1) 
            {
                $mensaje =  Mensajes::MensajeIntegridad;
                header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");            
            }
            else
            {
                $mensaje = Mensajes::MensajeErrorBD;
                header("Location: ../Vistas/Repuesta.php?respuesta=E&mensaje=$mensaje");
            }
        }
        if ($tabla == '2') // TBL_CLIENTES
        {
            $controlador  = Funciones::crearControlador_Cliente();
            $Resultado = $controlador->eliminarCliente($id);
            if ($Resultado == 0)
            {              
                header("Location: ../Vistas/Listado_Clientes.php");                                 
            }
            elseif ($Resultado == 1)
            {
                $mensaje = Mensajes::MensajeIntegridad;
                header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");            
            }
            else
            {
                $mensaje = Mensajes::MensajeErrorBD;
                header("Location: ../Vistas/Repuesta.php?respuesta=E&mensaje=$mensaje");
            }
        }
        if ($tabla == '3') // TBL_PRODUCTOS
        {
           $controlador  = Funciones::crearControlador_Producto();
           $Resultado = $controlador->eliminarProducto($id);
           if ($Resultado == 0)
           {
                  header("Location: ../Vistas/Listado_Productos.php");                          
           }
           elseif ($Resultado == 1)
           {
                $mensaje= Mensajes::MensajeIntegridad;
                header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");            
           }
           else
           {
                  $mensaje = Mensajes::MensajeErrorBD;
                  header("Location: ../Vistas/Repuesta.php?respuesta=E&mensaje=$mensaje");
           }
        }
        if ($tabla == '4') // TBL_Proveedores
        {
           $controlador  = Funciones::crearControlador_Proveedor();
           $Resultado = $controlador->eliminarProveedor($id);                         
           if ($Resultado == 0)
           {
               header("Location: ../Vistas/Listado_Proveedores.php");                                 
           }
           elseif ($Resultado == 1)
           {
                $mensaje= Mensajes::MensajeIntegridad;
                header("Location: ../Vistas/Respuesta.php?mensaje=$mensaje");            
           }
           else
           {
               $mensaje = Mensajes::MensajeErrorBD;
               header("Location: ../Vistas/Repuesta.php?respuesta=E&mensaje=$mensaje");
           }
        }
