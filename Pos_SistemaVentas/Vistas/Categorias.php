<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Categorias</title>
          <link rel="stylesheet" type="text/css" href="Estilo.css">
          <script src="../resources/script/FuncionesTeclado.js" type="text/javascript"></script>     
    </head>

  <body>    
        <?php         
             require_once '../BLL/AutoLoader.php';             
             spl_autoload_register();
             $mensajeError = NULL;
             $id = 0;
             $nombre = NULL;           

             if (filter_input_array(INPUT_GET))
             {
                $id = base64_decode(filter_input(INPUT_GET, 'id'), FILTER_SANITIZE_NUMBER_INT); 
                $categoria = new Categoria();
                $controlador = Funciones::crearControlador_Categoria();                
                $categoria = $controlador->ObtenerCategoria($id);        
                if ($categoria != NULL)
                {
                    $nombre = $categoria->getNombre();                   
                }
             }

             if (filter_input_array(INPUT_POST))    
             { 
                $id = trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT));              
                $nombre = trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING));
                // Validaciones antes de enviar a BD
                $grabar = true;
                if (Funciones::validar_CampoRequerido($nombre))
                {                
                    $grabar = false;
                    $mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	        } 
                if ($grabar)
                {    
                  Response_Categoria::grabar_Categoria();
                }
             }
        ?>
  <div id="container"> 
       <div id="header">    
            <a href="../Vistas/Menu.php"><img src="../resources/imagenes/Inicio.jpg" alt="" /></a>
        </div>
   </div> 
  
               
  <form name="formCategorias" action="../Vistas/Categorias.php" method="POST">
        <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>
        <br></br>
              <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
			<table width="40%" align="center" border="1" cellspacing="0" cellpadding="6">
                            <tr>
                                <td align="center" bgcolor="#008080"><big style="color:#FFFFFF"><b>Administrar Categorías</b></big></td>
                            </tr>

                            <tr>
                                <td align="center" colspan="2">
                                    <table border="0"   cellspacing="5">
                                       <tr>
					   <td align="right"><b>Nombre *</b></td>
					   <td align="left">
                                               <input type="text" 
                                                      id="itNombre" 
                                                      name="itNombre" 
                                                      value="<?php echo !empty($nombre)?$nombre:'';?>" 
                                                      placeholder="Categoria" 
                                                      maxlength="50" 
                                                      required="required"/>                    
                                           </td>
				       </tr> 
				     </table>
				      <br></br>
                                    <div align="center">
                                         <input type="submit" id="btnnav" value="Enviar">
                                    </div>

                                    <div align="center">
                                         <input type="text" 
                                                style="border-style: none; background-color: antiquewhite; color: red;"  
                                                id="itMensajeError" 
                                                name="itMensajeError" 
                                                size="40" 
                                                value="<?php echo !empty($mensajeError)?$mensajeError:'';?>"
                                                readonly/> 
                                    </div>                       
                                </td>
                            </tr>
			</table> 
		     </td>
                </tr>
              </table> 
  </form>
 </body>
</html>
