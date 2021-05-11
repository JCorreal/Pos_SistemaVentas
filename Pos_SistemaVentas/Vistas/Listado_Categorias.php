<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Listado Categorias</title>
            <link href="Estilo.css" rel="stylesheet" type="text/css"/>
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
         require_once '../BLL/AutoLoader.php';
         spl_autoload_register();

         $datoBuscar = '';
         if (filter_input_array(INPUT_GET))
         { 
             $datoBuscar = filter_input(INPUT_GET, 'Buscar');
         }          
         if (filter_input_array(INPUT_POST))  
         {              
            $datoBuscar = trim(filter_input(INPUT_POST, 'query', FILTER_SANITIZE_STRING));
            if ($datoBuscar != '')
            {
                header("Location: ../Vistas/Listado_Categorias.php?Buscar=$datoBuscar");        
            }         
         }
    ?>

 
<body>  
  <div id="container"> 
       <div id="header">    
            <a href="../Vistas/Menu.php"><img src="../resources/imagenes/Inicio.jpg" alt="" /></a>
       </div>
  </div>   
                 
    <form name="formListado_Categorias" action="../Vistas/Listado_Categorias.php" method="post">

        <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">

             <tr>
                <td width="400" align="right">        
                   <input type="text" name="query" id="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Categoria..." />
                   <input type="submit" id="btnsearch" style="border:1px solid #066; background:#066;" value="Buscar" name="search" />                            
                </td>

                <td width="127" height="37" align="right">
                    <a href="../Vistas/Categorias.php">
                       <input type="button" style="border:1px solid #066; background:#066; height:45px; width:140px; color:#FFF; border-radius:3px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Agregar Categoria" />
                    </a>
                </td>
             </tr>    
        </table>
  
        <br></br>
          
              <table border="0" cellpadding="0" cellspacing="0" align="center" width="40%" style="border:1px solid #066; color:#033; border-radius:3px;">
                    <tr>
                        <th colspan="2" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Información Categorias</th>
                    </tr>

                       <tr height="30px">
                           <th style="border-bottom:1px solid #333;"> Nombre </th>
                           <th style="border-bottom:1px solid #333;"> Accion </th>
                       </tr>

                      <?php                      
                           $vector_resultado = array();                               
                           $controlador = Funciones::crearControlador_Categoria();
                           $vector_resultado = $controlador->buscar($datoBuscar);     

                           foreach($vector_resultado as $lista => $valor){?>      
                           <tr align="center" style="height:25px">
                               <td style="border-bottom:1px solid #333;"> <?php echo $valor[1]; ?> </td>
                               <td style="border-bottom:1px solid #333;">
                                   <a href="../Vistas/Categorias.php?id=<?php echo base64_encode($valor[0]);?>">
                                     <input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"/>
                                   </a>                              
                                   <a href="../Form_Response/Response_Eliminar.php?id=<?php echo base64_encode($valor[0]);?>&accion=1">
                                      <input type="button" value="Eliminar" onclick="return Confirmar();" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"/>
                                   </a>       
                               </td>                   
                           </tr>
                        <?php
                     }?>
              </table>             
     </form>
 </body>
</html>
