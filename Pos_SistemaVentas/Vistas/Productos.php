
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
           <title>Product</title>
           <link rel="stylesheet" type="text/css" href="Estilo.css">
           <script src="../resources/script/FuncionesTeclado.js" type="text/javascript"></script>
           <script type="text/javascript">
                 function ValidarDatos()
                 {
                    if (document.getElementById("itPrecio_Venta").value.substring(0,1)==='0') 
                    { 	
                        document.getElementById("itMensajeError").value = 'Error, primera cifra no puede ser 0';	
                        document.getElementById("itPrecio_Venta").focus();             
                        return false;
                    } 
                    if (document.getElementById("itPrecio_Compra").value.substring(0,1)==='0') 
                    { 	
                        document.getElementById("itMensajeError").value = 'Error, primera cifra no puede ser 0';	
                        document.getElementById("itPrecio_Compra").focus();             
                        return false;
                    } 
                    if (document.getElementById("itCantidad").value.substring(0,1)==='0') 
                    { 	
                        document.getElementById("itMensajeError").value = 'Error, primera cifra no puede ser 0';	
                        document.getElementById("itCantidad").focus();             
                        return false;
                    } 
                    var PrecioCompra = Number(document.getElementById("itPrecio_Compra").value);                                        
                    var PrecioVenta = Number(document.getElementById("itPrecio_Venta").value); 
                    if ( PrecioVenta  <  PrecioCompra )
                    {
                        document.getElementById("itMensajeError").value = 'Error, precio de venta es menor que el de compra';	
                        document.getElementById("itPrecio_Venta").focus();     
                        return false;
                    }
                    return true;
                 }
           </script>
    
    </head>

 <body>
    
   <?php      
        require_once '../BLL/AutoLoader.php';  
        session_start();
        spl_autoload_register();
        $mensajeError = NULL;     
        $id = 0;
        $categoria_id=NULL; 
        $nombre=NULL; 
        $cantidad=NULL; 
        $precio_compra=NULL; 
        $precio_venta=NULL; 
        $proveedor_id=NULL;           
        $arlistado = array();
        $arproveedores = array();
        $arcategorias = array();
        $controlador = Funciones::crearControlador_Producto();
        if(empty($_SESSION['ListadoProveedores']))               
        {
             $arlistado = $controlador->CargarCombos("tbl_Productos");             
                $tamano = sizeof ($arlistado);
                for($j=0; $j<$tamano; $j++)
                {           
                    if ($arlistado[$j] == "Categorias")
                    {                           
                        array_push($arcategorias, $arlistado[$j+1], $arlistado[$j+2]);
                        $j++;$j++;
                    }           
                    elseif ($arlistado[$j] == "Proveedores")
                    {                   
                        array_push($arproveedores, $arlistado[$j+1], $arlistado[$j+2]);
                        $j++;$j++;
                    }        
                }  
                $_SESSION['ListadoProveedores']=  $arproveedores;              
                $_SESSION['ListadoCategorias']=  $arcategorias;  
        }
            if (filter_input_array(INPUT_GET))
            {
                $id = base64_decode(filter_input(INPUT_GET, 'id'), FILTER_SANITIZE_NUMBER_INT); 
                $producto = new Producto();            
                $producto = $controlador->obtenerProducto($id);        
                if ($producto != NULL)
                {
                    $categoria_id = $producto->getCategoria_id();                
                    $proveedor_id = $producto->getProveedor_id();
                    $nombre = $producto->getNombre();
                    $cantidad = $producto->getCantidad();
                    $precio_compra = $producto->getPrecio_compra();
                    $precio_venta = $producto->getPrecio_venta();
                }
            }
    

    if (filter_input_array(INPUT_POST)) 
    { 
            $id = trim(filter_input(INPUT_POST, 'itCampoClave', FILTER_SANITIZE_NUMBER_INT));          
            $categoria_id = trim(filter_input(INPUT_POST, 'itCategoria', FILTER_SANITIZE_NUMBER_INT));  
            $nombre = trim(filter_input(INPUT_POST, 'itNombre', FILTER_SANITIZE_STRING));
            $cantidad = trim(filter_input(INPUT_POST, 'itCantidad', FILTER_SANITIZE_NUMBER_INT));  
            $precio_compra = trim(filter_input(INPUT_POST, 'itPrecio_Compra', FILTER_SANITIZE_NUMBER_INT));   
            $precio_venta = trim(filter_input(INPUT_POST, 'itPrecio_Venta', FILTER_SANITIZE_NUMBER_INT));  
            $proveedor_id = trim(filter_input(INPUT_POST, 'itProveedor', FILTER_SANITIZE_NUMBER_INT));   
            
            $grabar = true;
            if (Funciones::validar_CampoRequerido($nombre)){                
                $grabar = false;
		$mensajeError ='Nombre'.' '.Mensajes::MensajeCampoRequerido;			
	    }          
            
            if (Funciones::validar_CampoRequerido($cantidad)){                
                $grabar = false;
		$mensajeError ='Cantidad'.' '.Mensajes::MensajeCampoRequerido;			
	    }          
            
            if (Funciones::validar_CampoRequerido($precio_compra)){                
                $grabar = false;
		$mensajeError ='Precio Compra'.' '.Mensajes::MensajeCampoRequerido;			
	    }          
            
            if (Funciones::validar_CampoRequerido($precio_venta)){                
                $grabar = false;
		$mensajeError ='Precio Venta'.' '.Mensajes::MensajeCampoRequerido;			
	    }     
            
            if(substr($cantidad,0,1) ==0){
                $grabar = false;
                $mensajeError = Mensajes::MensajeCero;		     
            }	
            
            if(substr($precio_compra,0,1) ==0){
                $grabar = false;
                $mensajeError = Mensajes::MensajeCero;		     
            }	
            
            if(substr($precio_venta,0,1) ==0){
                $grabar = false;
                $mensajeError = Mensajes::MensajeCero;		     
            }	            
            
            if ($precio_compra > $precio_venta) {
                $grabar = false;
                $mensajeError = Mensajes::MensajePrecio;		     
            }	
            
            if ($grabar)
            {  
                Response_Producto::grabar_Producto();
            }
       }
    ?>
    
  <div id="container"> 
       <div id="header">    
            <a href="../Vistas/Menu.php"><img src="../resources/imagenes/Inicio.jpg" alt="" /></a>
       </div>
  </div> 
    
   
   <form name="formProductos" action="../Vistas/Productos.php" method="POST"> 
        <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>
        <br></br>
        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>   
                  <td align="center">
                      <table width="40%" align="center" border="1" cellspacing="0" cellpadding="6">
                            <tr>
                                <td align="center" bgcolor="#008080"><big style="color:#FFFFFF"><b>Administrar Productos</b></big></td>
                                 <tr>
                                     <td align="center" colspan="2">
                                        <table border="0"   cellspacing="5">
                                               <tr>
                                                   <td align="right">Categoria *</td>
                                                   <td align="left">
                                                       <select id="itCategoria" 
                                                               name="itCategoria">
                                                               <?php 
                                                                    $tamano = sizeof ($_SESSION['ListadoCategorias']);
                                                                    for($i=0; $i<$tamano; $i++){ ?>
                                                                      <option value="<?php echo $_SESSION['ListadoCategorias'][$i];  ?>"
                                                                             <?php if (($id!=0) &&  ($_SESSION['ListadoCategorias'][$i] == $categoria_id)): ?>
                                                                                       selected="selected"
                                                                             <?php endif; ?>
                                                                             ><?php $i++; echo $_SESSION['ListadoCategorias'][$i]; } ?>
                                                                      </option>                             
                                                       </select>
                                                   </td>
                                               </tr>
                                            
                                               <tr>
                                                   <td align="right">Nombre *</td>
                                                   <td align="right">
                                                       <input type="text" 
                                                              id="itNombre" 
                                                              name="itNombre" 
                                                              value="<?php echo !empty($nombre)?$nombre:'';?>" 
                                                              maxlength="100" placeholder="Nombre" 
                                                              required="required"/>
                                                   </td>
                                               </tr>
                                               
                                               <tr>
                                                   <td align="right">Cantidad *</td>
                                                   <td align="left">
                                                       <input type="text" 
                                                              id="itCantidad" 
                                                              min="1" 
                                                              name="itCantidad" 
                                                              value="<?php echo !empty($cantidad)?$cantidad:'';?>" 
                                                              maxlength="11" 
                                                              placeholder="Stock" 
                                                              required="required"
                                                              onkeypress="return ValidarNumeros(event)" 
                                                              onkeydown="return AnularPegado(event)"/>
                                                   </td>
                                               </tr>
                                            
                                               <tr>
                                                   <td align="right">Precio de Compra *</td>
                                                   <td align="left">
                                                       <input type="text" 
                                                              id="itPrecio_Compra" 
                                                              name="itPrecio_Compra" 
                                                              value="<?php echo !empty($precio_compra)?$precio_compra:'';?>" 
                                                              maxlength="11" 
                                                              placeholder="Precio de Compra" 
                                                              required="required"
                                                              onkeypress="return ValidarNumeros(event)" 
                                                              onkeydown="return AnularPegado(event)"/>                    
                                                   </td>
                                               </tr>

                                               <tr>
                                                   <td align="left">Precio de Venta *</td>
                                                   <td align="left">
                                                       <input type="text" 
                                                              id="itPrecio_Venta" 
                                                              name="itPrecio_Venta" 
                                                              value="<?php echo !empty($precio_venta)?$precio_venta:'';?>" 
                                                              maxlength="11" 
                                                              placeholder="Precio de Venta" 
                                                              required="required"
                                                              onkeypress="return ValidarNumeros(event)" 
                                                              onkeydown="return AnularPegado(event)"/>                   
                                                   </td>
                                               </tr>
                                            
                                               <tr>
                                                   <td align="right">Proveedor *</td>
                                                   <td align="left">
                                                       <select id="itProveedor" 
                                                               name="itProveedor">
                                                               <?php 
                                                                    $tamano = sizeof ($_SESSION['ListadoProveedores']);
                                                                    for($i=0; $i<$tamano; $i++){ ?>
                                                                      <option value="<?php echo $_SESSION['ListadoProveedores'][$i];  ?>"
                                                                              <?php if (($id!=0) &&  ($_SESSION['ListadoProveedores'][$i] == $proveedor_id)): ?>
                                                                                        selected="selected"
                                                                              <?php endif; ?>
                                                                              ><?php $i++; echo $_SESSION['ListadoProveedores'][$i]; } ?>
                                                                      </option>                             
                                                       </select>
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
                            </tr>   
                      </table>
                  </td>    
              </tr>
        </table>          
   </form>
 </body>
</html>
