
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
                    var PrecioCompra = document.getElementById("itPrecio_Compra").value;                                        
                    var PrecioVenta = document.getElementById("itPrecio_Venta").value; 
                    if (PrecioVenta < PrecioCompra)
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
        require_once '../BO/Producto.php';   
        require_once '../BLL/Controlador_Producto.php';          
        require_once '../BLL/Funciones.php';   
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
        $controlador = Funciones::CrearControlador();
        if(empty($_SESSION['ListadoProveedores']))               
           {
             $arlistado = $controlador->CargarCombos("tbl_Productos");             
                for($j=0; $j<(sizeof ($arlistado)); $j++)
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
        if ( !empty($_GET['id']))
        {
            $producto = new Producto();
            $id = $_GET['id'];
            $producto = $controlador->ObtenerProducto($id);        
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
    

    if ( !empty($_POST)) 
    { 
            $id =trim(INPUT_POST, 'itCampoClave');
            $categoria_id = $_POST['itCategoria'];
            $nombre = $_POST['itNombre'];
            $cantidad = $_POST['itCantidad'];
            $precio_compra= $_POST['itPrecio_Compra'];
            $precio_venta = $_POST['itPrecio_Venta'];
            $proveedor_id = $_POST['itProveedor'];
            
            $grabar = true;
            if (Funciones::Validar_CampoVacio($nombre)){                
                $grabar = false;
		$mensajeError ='Nombre'.' '.MensajeCampoRequerido;			
	    }          
            
            if (Funciones::Validar_CampoVacio($cantidad)){                
                $grabar = false;
		$mensajeError ='Cantidad'.' '.MensajeCampoRequerido;			
	    }          
            
            if (Funciones::Validar_CampoVacio($precio_compra)){                
                $grabar = false;
		$mensajeError ='Precio Compra'.' '.MensajeCampoRequerido;			
	    }          
            
            if (Funciones::Validar_CampoVacio($precio_venta)){                
                $grabar = false;
		$mensajeError ='Precio Venta'.' '.MensajeCampoRequerido;			
	    }     
            
            if(substr($cantidad,0,1) ==0){
                $grabar = false;
                $mensajeError = MensajeCero;		     
            }	
            
            if(substr($precio_compra,0,1) ==0){
                $grabar = false;
                $mensajeError = MensajeCero;		     
            }	
            
            if(substr($precio_venta,0,1) ==0){
                $grabar = false;
                $mensajeError = MensajeCero;		     
            }	            
            
            if ($precio_compra > $precio_venta) {
                $grabar = false;
                $mensajeError = MensajePrecio;		     
            }	
            
            if ($grabar)
            {  
                Controlador_Producto::Grabar_Producto();
            }
       }
    ?>
    
     <form name="formProductos" action="../Vistas/Productos.php" method="POST"> 
        <div>
            <div id="popup-head-color2" align="center">
             <p> Administrar Productos </p>
           </div>
           <br>
           <input id="itCampoClave" name="itCampoClave" type="hidden" value="<?php echo !empty($id)?$id:0;?>"/>

            <table border="0" align="center">

              <tr>
                  <td align="left">Categoria *</td>
                  <td align="left">
                      <select id="itCategoria" 
                              name="itCategoria">
                             <?php for($i=0; $i<(sizeof ($_SESSION['ListadoCategorias'])); $i++){ ?>
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
              <td align="left">Nombre *</td>
              <td align="left">
                  <input type="text" 
                         id="itNombre" 
                         name="itNombre" 
                         value="<?php echo !empty($nombre)?$nombre:'';?>" 
                         maxlength="100" placeholder="Nombre" 
                         required/>
                  <br></td>
              </tr>

              <tr>
              <td align="left">Cantidad *</td>
              <td align="left">
                  <input type="text" 
                         id="itCantidad" 
                         min="1" 
                         name="itCantidad" 
                         value="<?php echo !empty($cantidad)?$cantidad:'';?>" 
                         maxlength="11" 
                         placeholder="Stock" 
                         required
                         onkeypress="return ValidarNumeros(event)" 
                         onkeydown="return AnularPegado(event)"/>
                  <br>
              </td>
              </tr>

              <tr>
              <td align="left">Precio de Compra *</td>
              <td align="left">
                  <input type="text" 
                         id="itPrecio_Compra" 
                         name="itPrecio_Compra" 
                         value="<?php echo !empty($precio_compra)?$precio_compra:'';?>" 
                         maxlength="11" 
                         placeholder="Precio de Compra" 
                         required
                         onkeypress="return ValidarNumeros(event)" 
                         onkeydown="return AnularPegado(event)"/>
                  <br>
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
                         required
                         onkeypress="return ValidarNumeros(event)" 
                         onkeydown="return AnularPegado(event)"/>
                  <br>
              </td>
              </tr>

              <tr>
                  <td align="left">Proveedor *</td>
                  <td align="left">
                      <select id="itProveedor" 
                              name="itProveedor">
                             <?php for($i=0; $i<(sizeof ($_SESSION['ListadoProveedores'])); $i++){ ?>
                             <option value="<?php echo $_SESSION['ListadoProveedores'][$i];  ?>"
                                    <?php if (($id!=0) &&  ($_SESSION['ListadoProveedores'][$i] == $proveedor_id)): ?>
                                              selected="selected"
                                    <?php endif; ?>
                                    ><?php $i++; echo $_SESSION['ListadoProveedores'][$i]; } ?>
                             </option>                             
                      </select>
                  </td>
              </tr>                 

              <br>
              <tr  align="left">
              <td>&nbsp;  </td>
              <td><input type="submit" id="btnnav" value="Enviar" onmousedown="return ValidarDatos();"/></a></td>
              </tr>
                 
                <tr>
                <td>
                    <td><input style="border-style: none; background-color: antiquewhite; color: red;" type="text" id="itMensajeError" name="itMensajeError" size="40" readonly/></td>
                </td>
                </tr>                  
                  
  
            </table>   
           
           

        </div>
    </form>
 </body>
</html>
