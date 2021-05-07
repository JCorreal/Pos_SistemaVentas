<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <title>Listado Ventas</title>
            <link href="Estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    
  <body>
        <?php             
             require_once '../BLL/AutoLoader.php';             
             spl_autoload_register();
        ?>  
      
  <div id="container"> 
       <div id="header">    
            <a href="../Vistas/Menu.php"><img src="../resources/imagenes/Inicio.jpg" alt="" /></a>
        </div>
   </div> 
    
                 
    <form name="formListado_Ventas" action="../Vistas/Listado_Ventas.php" method="post">
                 
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
            <tr>
                <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #066; color:#FFF;"> Seleccionar Productos </th>
            </tr>

             <tr height="30px">
               <th style="border-bottom:1px solid #333;"> Categoria </th>
               <th style="border-bottom:1px solid #333;"> Nombre </th>
               <th style="border-bottom:1px solid #333;"> Precio </th>
               <th style="border-bottom:1px solid #333;"> Cantidad Stock </th>
               <th style="border-bottom:1px solid #333;"> Proveedor </th>
               <th style="border-bottom:1px solid #333;"> Hacer Pedido </th>
             </tr>

              <?php                   
                   $vector_resultado = array();
                   $controlador = Funciones::crearControlador_Venta();            
                   $vector_resultado = $controlador->buscar();    
                   foreach($vector_resultado as $lista => $valor){?>       
                    <tr align="center" style="height:25px">
                       <td style="border-bottom:1px solid #333;"> <?php echo $valor[1]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $valor[2]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $valor[3]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $valor[4]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $valor[5]; ?> </td>
                       <td style="border-bottom:1px solid #333;">
                           <a href="../Vistas/Ventas.php?id=<?php echo $valor[0];?>">
                               <input type="button" value="Pedir" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"/>
                           </a>
                        </td>
                    </tr>
                <?php
               }?>
           </table>          
    </form>
  </body>
</html>
