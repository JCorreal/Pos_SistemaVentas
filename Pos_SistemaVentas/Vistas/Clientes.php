<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Clientes</title>
          <link rel="stylesheet" type="text/css" href="Estilo.css">          
          <script src="../resources/script/FuncionesTeclado.js" type="text/javascript"></script>    
    </head>

  <body>    
        <?php         
             require_once '../BO/Cliente.php';   
             require_once '../BLL/Controlador_Cliente.php';       
             require_once '../BLL/Funciones.php';                
             $id = 0;
             $nombre=NULL; 
             $telefono=NULL;
             $direccion=NULL;
             $observacion=NULL;

             if ( !empty($_GET['id']))
             {
                $id = $_GET['id'];
                $controlador = Funciones::CrearControlador();
                $cliente = new Cliente();                
                $cliente = $controlador->ObtenerCliente($id);        
                if ($cliente != NULL)
                {
                    $nombre = $cliente->getNombre();
                    $telefono = $cliente->getTelefono();
                    $direccion = $cliente->getDireccion();
                    $observacion = $cliente->getObservacion();
                }
             }

            if ( !empty($_POST))
            { 
                $id =trim(INPUT_POST, 'itCampoClave');
                $nombre = $_POST['itNombre'];
                $telefono = $_POST['itTelefono'];
                $direccion = $_POST['itDireccion'];
                $observacion = $_POST['itObservacion'];                    
                Controlador_Cliente::Grabar_Cliente();        
            }
        ?>

    <form name="formClientes" action="../Vistas/Clientes.php" method="POST">
        <div>
           <div id="popup-head-color2" align="center">
           <p> Administrar Clientes </p>
           </div>
           <br>
           <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>

           <table border="0" align="center">

            <tr>
                <td align="right">Nombre *</td>
                <td>
                    <input type="text" 
                           id="itNombre" 
                           name="itNombre" 
                           value="<?php echo !empty($nombre)?$nombre:'';?>" 
                           maxlength="50" 
                           placeholder="Nombres" 
                           required/>
                    <br></td>
            </tr>
               
            <tr>
               <td align="right">Telefono *</td>
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
                <td align="right">Direccion *</td>
                <td>
                    <input id="itDireccion" 
                           name="itDireccion" 
                           value="<?php echo !empty($direccion)?$direccion:'';?>" 
                           maxlength="50" 
                           placeholder="Direccion"
                           required/>
                    <br>
                </td>
            </tr>
            
           <tr>
                <td align="right">Observaciones</td>
                <td>
                    <textarea id="itObservacion" 
                              name="itObservacion"                               
                              placeholder="Notas"  
                              rows="4" 
                              cols="22">
                              <?php echo !empty($observacion)?$observacion:'';?>
                    </textarea>
                    <br>
                </td>                
            </tr>      

            <br>
            <tr align="left">
                <td>&nbsp;</td>
                <td><input type="submit" id="btnnav" value="Enviar"></a></td>
            </tr>

           </table>
        </div>
    </form>

  </body>
</html>
