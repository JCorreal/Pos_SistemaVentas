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
             require_once '../BO/Categoria.php'; 
             require_once '../BLL/Controlador_Categoria.php';       
             require_once '../BLL/Funciones.php';   
             $id = 0;
             $nombre=NULL;           

            if ( !empty($_GET['id']))
            {
                $id = $_GET['id'];
                $categoria = new Categoria();
                $controlador = Funciones::CrearControlador();                
                $categoria = $controlador->ObtenerCategoria($id);        
                if ($categoria != NULL)
                {
                    $nombre = $categoria->getNombre();                   
                }
            }

            if ( !empty($_POST))
            { 
                $id =trim(INPUT_POST, 'itCampoClave');
                $nombre = $_POST['itNombre'];
                Controlador_Categoria::Grabar_Categoria();        
            }
        ?>
      <form name="formCategorias" action="../Vistas/Categorias.php" method="POST">
    <div>
       <div id="popup-head-color2" align="center">
       <p> Administrar Categorias </p>
       </div>
       <br>
         <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>

       <table border="0" align="center">
            <tr>
            <td align="right">Nombre *</td>
            <td><input type="text" 
                       id="itNombre" 
                       name="itNombre" 
                       value="<?php echo !empty($nombre)?$nombre:'';?>" 
                       placeholder="Categoria" 
                       maxlength="50"
                       required/>
                <br></td>
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
