<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Listado Proveedores</title>
            <script type="text/javascript">
               function Confirmar()
               {
                var opcion = confirm("Seguro quiere eliminar este registro");
                if (opcion === true)                 
                    return true;                
                else                 
	            return false;                
               }
            </script>
    </head>
    
    <?php
     require_once '../Vistas/Maestro.php';
    
     $DatoBuscar=NULL;
     if (!empty($_GET['Buscar']))
     {
        $DatoBuscar = $_GET['Buscar'];
     }          
     if ( !empty($_POST)) 
           {              
               $DatoBuscar =trim($_POST['query']);

                if ($DatoBuscar!='')
                {
                  $DatoBuscar =trim($_POST['query']);            
                }                  
                else
                {   
                    header("Location: ../Vistas/Proveedores.php?Buscar=$DatoBuscar");  
                }               
           }
?>

 
<body>    
    <form name="formListado_Proveedores" action="../Vistas/Listado_Proveedores.php.php" method="post">

        <br><br><br><br>   

        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

             <tr>
               <td width="750" align="right">        
                   <input type="text" name="query" id="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Proveedor..." />
                   <input type="submit" id="btnsearch" value="Buscar" name="search" />                            
               </td>

               <td width="127" height="37" align="right">
                   <a href="../Vistas/Proveedores.php">
                       <input type="button" style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Agregar Proveedor" />
                   </a>
               </td>
             </tr>    
        </table>
  
            <br>

            <tr>
              <td>
              <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #066; color:#033; border-radius:3px;">

               <tr>
                   <th colspan="6" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Información Proveedores</th>
               </tr>

                  <tr height="30px">
                    <th style="border-bottom:1px solid #333;"> Nombre </th>
                    <th style="border-bottom:1px solid #333;"> Persona de Contacto </th>
                    <th style="border-bottom:1px solid #333;"> Direccion </th>
                    <th style="border-bottom:1px solid #333;"> Telefono </th>
                    <th style="border-bottom:1px solid #333;"> Observaciones </th>
                    <th style="border-bottom:1px solid #333;"> Accion </th>
                  </tr>

                 <?php
                      require_once '../BLL/Funciones.php';     
                      $vector_resultado = array();
                      $tabla = 'Proveedores';           
                      $controlador = Funciones::CrearControlador();

                      if ($DatoBuscar != NULL)
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
                              <a href="../Vistas/Proveedores.php?id=<?php echo $vector_resultado[$i][0];?>">
                              <input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"/>
                           </a>
                           <a href="../BLL/Controlador_Eliminar.php?id=<?php echo $vector_resultado[$i][0];?>&tabla=Proveedores">
                              <input type="button" value="Eliminar" onclick="return Confirmar();" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"/>
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