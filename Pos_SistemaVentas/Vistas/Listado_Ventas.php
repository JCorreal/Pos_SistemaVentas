<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <title>Listado Ventas</title>
    </head>
        
    <?php require_once '../Vistas/Maestro.php'; ?>
    
  <body>
    
    <form name="formListado_Ventas" action="../Vistas/Listado_Ventas.php" method="post">

        <br><br><br><br>   
            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

             <tr>
               <td height="37" align="right">

               <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />

               </td>
             </tr>

           </table>
        <br>
         <tr>
           <td>
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">

            <tr>
            <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Seleccionar Productos </th>
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
                   require_once '../BLL/Funciones.php';     
                   $vector_resultado = array();
                   $tabla = 'tbl_Ventas';           
                   $controlador = Funciones::CrearControlador();            
                   $DatoBuscar='';
                   if ($DatoBuscar != '')
                   {
                     $vector_resultado = $controlador->BuscarDatoLista($tabla, $DatoBuscar);         
                   }
                   else
                   {
                        $DatoBuscar='';
                        $vector_resultado = $controlador->BuscarDatoLista($tabla, $DatoBuscar);                              
                   }

                   for ($i = 0; $i < (sizeof($vector_resultado)); $i++){?>      
                    <tr align="center" style="height:25px">
                       <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][1]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][2]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][3]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][4]; ?> </td>
                       <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][5]; ?> </td>
                       <td style="border-bottom:1px solid #333;">
                           <a href="../Vistas/Ventas.php?id=<?php echo $vector_resultado[$i][0];?>">
                               <input type="button" value="Pedir" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"/>
                           </a>
                        </td>
                    </tr>
                <?php
               }?>
           </table>
         </td>
        </tr>
    </form>
  </body>
</html>
