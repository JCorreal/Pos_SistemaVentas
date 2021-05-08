<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Proveedor</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
        <script src="../resources/script/FuncionesTeclado.js" type="text/javascript"></script>     
    </head>

  <body>    
        <?php         
             require_once '../BLL/AutoLoader.php';             
             spl_autoload_register();
             $mensajeError = NULL;
             $id = 0;
             $nombre=NULL; 
             $contacto=NULL;
             $direccion=NULL;
             $telefono=NULL;
             $observacion=NULL;             

           if (filter_input_array(INPUT_GET))
           {
                $id = base64_decode(filter_input(INPUT_GET, 'id'), FILTER_SANITIZE_NUMBER_INT); 
                $proveedor = new Proveedor();
                $controlador = Funciones::crearControlador_Proveedor();                
                $proveedor = $controlador->ObtenerProveedor($id);        
                if ($proveedor != NULL)
                {
                    $nombre = $proveedor->getNombre();
                    $contacto = $proveedor->getContacto();
                    $direccion = $proveedor->getDireccion();
                    $telefono = $proveedor->getTelefono();
                    $observacion = $proveedor->getObservacion();                    
                }
            }

            if (filter_input_array(INPUT_POST)) 
            { 
                $id = trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT));   
                $nombre = trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING));
                $contacto = trim(filter_input(INPUT_POST, 'itContacto', FILTER_SANITIZE_STRING)); 
                $direccion = trim(filter_input(INPUT_POST, 'itDireccion', FILTER_SANITIZE_STRING)); 
                $telefono = trim(filter_input(INPUT_POST, 'itTelefono', FILTER_SANITIZE_STRING));  
                $observacion = trim(filter_input(INPUT_POST, 'itObservacion', FILTER_SANITIZE_STRING)); 
                
                // Validaciones antes de enviar a BD
                $grabar = true;
                if (Funciones::validar_CampoRequerido($nombre))
                {                
                    $grabar = false;
                    $mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	        } 
                if (Funciones::validar_CampoRequerido($contacto))
                {                
                    $grabar = false;
                    $mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	        } 
                if (Funciones::validar_CampoRequerido($direccion))
                {                
                    $grabar = false;
                    $mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	        } 
                if (Funciones::validar_CampoRequerido($telefono))
                {                
                    $grabar = false;
                    $mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	        } 
                if (Funciones::validar_SoloNumeros($telefono))
                {                        
                        $grabar = false;
                        $mensajeError = Mensajes::MensajeNumerico;  
                }
                if(Funciones::validar_PrimeraPosicion($telefono))
                {
                    $grabar = false;
                    $mensajeError = Mensajes::MensajeCero;		     
                }                
                if(Funciones::validar_Longitud($telefono))
                {// Aceptar sólo 7 dígitos para teléfonos fijos y 10 para celulares
                   $grabar = false;
                   $mensajeError = Mensajes::MensajeTelefono;		      
                }
                if (Funciones::validar_CampoRequerido($direccion))
                {                
                    $grabar = false;
                    $mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	        } 
                if ($grabar)
                {  
                    Response_Proveedor::grabar_Proveedor(); 
                }
            }
        ?>

  <div id="container"> 
       <div id="header">    
            <a href="../Vistas/Menu.php"><img src="../resources/imagenes/Inicio.jpg" alt="" /></a>
        </div>
   </div>       
  
  <form name="formProveedores" action="../Vistas/Proveedores.php" method="POST">
     <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>
     <br></br>
     <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
			<table width="40%" align="center" border="1" cellspacing="0" cellpadding="6">
                            <tr>
                                <td align="center" bgcolor="#008080"><big style="color:#FFFFFF"><b>Administrar Proveedores</b></big></td>
                            </tr>

                            <tr>
                                <td align="center" colspan="2">
                                    <table border="0"   cellspacing="5">
                                    <tr>
                                <td align="center" colspan="2">
                                    <table border="0"   cellspacing="5">
                                            <tr>
                                                <td align="right">Nombre Proveedor *</td>
                                                    <td><input type="text" 
                                                               id="itNombre" 
                                                               name="itNombre" 
                                                               value="<?php echo !empty($nombre)?$nombre:'';?>" 
                                                               placeholder="Proveedor" 
                                                               maxlength="50"
                                                               required="required"/>
                                                    </td>
                                                </tr>

                                                <tr>
                                                <td align="right">Persona de contacto *</td>
                                                    <td><input type="text" id="itContacto" 
                                                               name="itContacto" 
                                                               value="<?php echo !empty($contacto)?$contacto:'';?>" 
                                                               placeholder="Contacto" 
                                                               maxlength="50"
                                                               required="required"/>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="right">Direccion *</td>
                                                    <td><input type="text" 
                                                               id="itDireccion" 
                                                               name="itDireccion" 
                                                               value="<?php echo !empty($direccion)?$direccion:'';?>" 
                                                               placeholder="Direccion" 
                                                               maxlength="50"
                                                               required="required"/>
                                                    </td>
                                                </tr>

                                                <tr>
                                                <td align="right">Numero Telefonico *</td>
                                                    <td><input type="text" 
                                                               id="itTelefono" 
                                                               name="itTelefono" 
                                                               value="<?php echo !empty($telefono)?$telefono:'';?>" 
                                                               maxlength="10"
                                                               placeholder="Telefono" 
                                                               required="required"                       
                                                               onkeypress="return ValidarNumeros(event)" 
                                                               onkeydown="return AnularPegado(event)"/>
                                                     </td>
                                                </tr>

                                                <tr>
                                                    <td align="right">Observaciones</td>
                                                    <td>
                                                        <textarea id="itObservacion"                                      
                                                                  name="itObservacion"                                
                                                                  placeholder="Observacion"                            
                                                                  cols="22" 
                                                                  rows="4">
                                                                  <?php echo !empty($observacion)?$observacion:'';?>
                                                        </textarea>                    
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
