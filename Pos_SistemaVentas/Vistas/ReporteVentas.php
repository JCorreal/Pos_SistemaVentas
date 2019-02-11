<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <title>Reporte de Ventas</title>
    </head>
    
    <?php
        require_once '../Vistas/Maestro.php';
        require_once '../BLL/Funciones.php';     

        $fechainicio=NULL;
        $fechafin=NULL;
        $ganancia=NULL;
        $total=NULL;
        $arlistado = array();
        $vector_resultado = array();              

        if ((!empty($_GET['Fecha_Inicio'])) && (!empty($_GET['Fecha_Fin'])))
        {
           $fechainicio = $_GET['Fecha_Inicio'];
           $fechafin = $_GET['Fecha_Fin'];
        }  

        if ( !empty($_POST)) 
        {                 
           $fechainicio = $_POST['FechaI'];
           $fechafin = $_POST['FechaF'];
        }

           if (($fechainicio != NULL) && ($fechafin != NULL))
           {
              $controlador = Funciones::CrearControlador(); 
              $vector_resultado = $controlador->BuscarDatoLista($fechainicio, $fechafin);   
              if (sizeof($vector_resultado)>0)
              {
                $total =$vector_resultado[0][6];    
                $ganancia =$vector_resultado[0][7];
              }
           }                 
       ?>

 
 <body>
    
     <form name="formReporteVentas" action="../Vistas/ReporteVentas.php" method="post">

        <br><br><br><br>   

       <table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">      
         <tr>
             <td width="48%" height="37" align="right"><input type="date" id="FechaI" name="FechaI" value="<?php echo !empty($fechainicio)?$fechainicio:'';?>" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" required /></td>
             <td width="15%" align="left"> <input type="date" id="FechaF" name="FechaF" value="<?php echo !empty($fechafin)?$fechafin:'';?>" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" required  /> </td>
             <td width="0%" align="left"><input type="submit" id="btnsearch" value="Buscar" name="search" /></td>
         </tr>    
       </table>

     <br>

     <tr>
       <td>
       <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">

        <tr>
            <th colspan="7" align="center" height="55px" style="background: #066; color: white" > Resumen de Ventas </th>
       </tr>

         <tr height="30px">
           <th style="border-bottom:1px solid #333;"> Fecha </th>
           <th style="border-bottom:1px solid #333;"> Cliente </th>
           <th style="border-bottom:1px solid #333;"> Producto </th>
           <th style="border-bottom:1px solid #333;"> Cantidad </th>
           <th style="border-bottom:1px solid #333;"> Venta </th>
           <th style="border-bottom:1px solid #333;"> Ganancia </th>
         </tr>

          <?php


               for ($i = 0; $i < (sizeof($vector_resultado)); $i++){?>      
               <tr align="center" style="height:35px">
                   <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][0]; ?> </td>
                   <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][1]; ?> </td>
                   <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][2]; ?> </td>
                   <td style="border-bottom:1px solid #333;"> <?php echo $vector_resultado[$i][3]; ?> </td>
                   <td style="border-bottom:1px solid #333;">$ <?php echo $vector_resultado[$i][4]; ?> </td>
                   <td style="border-bottom:1px solid #333;">$ <?php echo $vector_resultado[$i][5]; ?> </td>                   
               </tr>
            <?php            
            }            
            ?>      
       </table>

       <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom-color: #030; border-right-color: #030; border-bottom-style: solid; border-right-style: solid; border-bottom-width: 1px; border-right-width: 1px;">
         <tr>
           <td width="20%" style="border-left-color: #030; border-left-style: solid; border-left-width: 1px;">&nbsp;</td>
           <td width="20%">&nbsp;</td>
           <td width="39%">&nbsp;</td>
           <td width="11%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px; border-left-color: #030; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px; height:35px;">Ventas</td>
           <td width="10%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px ; height:35px;">Ganancias</td>
         </tr>
         <tr>
           <td style="border-bottom-color: #030; border-bottom-style: none; border-bottom-width: 1px; border-right-width: 1px; border-top-width: 1px; border-left-color: #030; border-left-style: solid; border-left-width: 1px;">Total Ingresos:</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td style="border-left-color: #030; height:35px; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px;">
               <?php echo "$"." ".$total; ?> 		  
           </td>
           <td height = "35px">     
               <?php echo "$"." ".$ganancia; ?>        
           </td>
         </tr>
       </table>    

     </td>
    </tr>
  </form>
 </body>
</html>
