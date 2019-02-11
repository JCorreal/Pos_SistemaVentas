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
             require_once '../BO/Proveedor.php'; 
             require_once '../BLL/Controlador_Proveedor.php';       
             require_once '../BLL/Funciones.php';   
             $id = 0;
             $nombre=NULL; 
             $contacto=NULL;
             $direccion=NULL;
             $telefono=NULL;
             $observacion=NULL;             

            if ( !empty($_GET['id']))
            {
                $id = $_GET['id'];
                $proveedor = new Proveedor();
                $controlador = Funciones::CrearControlador();                
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

            if ( !empty($_POST))
            { 
                $id =trim(INPUT_POST, 'itCampoClave');
                $nombre = $_POST['itNombre'];
                $contacto = $_POST['itContacto'];
                $direccion = $_POST['itDireccion'];
                $telefono = $_POST['itTelefono'];
                $observacion = $_POST['itObservacion'];
                Controlador_Proveedor::Grabar_Proveedor();        
            }
        ?>
  <form name="formProveedores" action="../Vistas/Proveedores.php" method="POST">
    <div>
       <div id="popup-head-color2" align="center">
       <p> Administrar Proveedores </p>
       </div>
       <br>
         <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>

       <table border="0" align="center">
            <tr>
            <td align="right">Nombre Proveedor *</td>
            <td><input type="text" 
                       id="itNombre" 
                       name="itNombre" 
                       value="<?php echo !empty($nombre)?$nombre:'';?>" 
                       placeholder="Proveedor" 
                       maxlength="50"
                       required/>
                <br></td>
            </tr>

            <tr>
            <td align="right">Persona de contacto *</td>
            <td><input type="text" id="itContacto" 
                       name="itContacto" 
                       value="<?php echo !empty($contacto)?$contacto:'';?>" 
                       placeholder="Contacto" 
                       maxlength="50"
                       required/>
                <br></td>
            </tr>

            <tr>
            <td align="right">Direccion *</td>
            <td><input type="text" 
                       id="itDireccion" 
                       name="itDireccion" 
                       value="<?php echo !empty($direccion)?$direccion:'';?>" 
                       placeholder="Direccion" 
                       maxlength="50"
                       required/>
                <br></td>
            </tr>

            <tr>
            <td align="right">Numero Telefonico *</td>
            <td><input type="text" 
                       id="itTelefono" 
                       name="itTelefono" 
                       value="<?php echo !empty($telefono)?$telefono:'';?>" 
                       maxlength="10"
                       placeholder="Telefono" 
                       required                       
                       onkeypress="return ValidarNumeros(event)" 
                       onkeydown="return AnularPegado(event)"/>
                  <br></td>
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
                    <br>
                </td>                
            </tr>    
           
            <br>
            <tr  align="left">
            <td>&nbsp;  </td>
            <td><input type="submit" id="btnnav" value="Enviar"></a></td>
            </tr>
       </table>
     </div>
  </form>
 </body>
</html>
