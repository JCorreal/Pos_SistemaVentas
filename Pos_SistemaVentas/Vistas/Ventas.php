<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Ventas</title>
          <link href="Estilo.css" rel="stylesheet" type="text/css"/>
          <script src="../resources/script/FuncionesTeclado.js" type="text/javascript"></script>    
          <script type="text/javascript">
                 function CalcularTotal()
                 {
                    var Cantidad = document.getElementById("itCantidad").value;
                    var PrecioVenta = document.getElementById("itPrecioVenta").value;     
                    var PrecioCompra = document.getElementById("itPrecioCompra").value;     
                    var Total = (Cantidad*PrecioVenta);                     
                    document.getElementById("itTotal").value =Total;       
                    var Gana = (Total - (Cantidad * PrecioCompra));
                    document.getElementById("itGanancia").value = Gana;
                 }
          </script>    
          <script type="text/javascript">
                 function CalcularDevolucion()
                 {                     
                    var Cantidad = document.getElementById("itCantidad").value;
                    var PrecioVenta = document.getElementById("itPrecioVenta").value;      
                    var Total = (Cantidad*PrecioVenta);   
                    var MontoCancelado = document.getElementById("itMonto_Cancelado").value;
                    if (MontoCancelado < Total)
                    {    
                      document.getElementById("itMensajeError").value = 'Error, monto entregado no cancela el total';	
                    }
                    else
                    {
                        var Total = document.getElementById("itTotal").value;
                        var Cambio = MontoCancelado - Total;                    
                        document.getElementById("itCambio").value =Cambio;  
                    }
                 }
          </script>    
          <script type="text/javascript">
                 function ValidarDatos()
                 {
                    var Cantidad = document.getElementById("quantity").value;                                    
                    var Stock = document.getElementById("Stock").value;
                    if (Cantidad <= 0)
                    {    
                      document.getElementById("itMensajeError").value = 'Error, cantidad debe ser mayor de 0';	
                      return false;
                    }
                    if (Cantidad > Stock)
                    {    
                      document.getElementById("itMensajeError").value = 'Error, cantidad supera el stock disponible';	
                      return false;
                    }
                    var Total = document.getElementById("total").value;                                   
                    var Monto = document.getElementById("tendered").value;
                    if (Monto < Total)
                    {    
                      document.getElementById("itMensajeError").value = 'Error, monto entregado no cancela el total';	
                      return false;
                    }
                    return true;
                 }
          </script>        
    </head>

 <body>
    
   <?php         
        require_once '../BLL/Controlador_Venta.php';       
        require_once '../BLL/Funciones.php';   
        $id = 0;    
	$cantidad=NULL;	
        $stock=NULL;
	$cliente=NULL;
	$categoria=NULL;
	$nombre=NULL;
	$precio_compra=NULL;
        $precio_venta=NULL;
	$total=NULL;
	$montorecibido=NULL;
	$cambio=NULL;	
        $arlistado = array();
        $arclientes = array();
        $controlador = Funciones::CrearControlador();

        if ( !empty($_GET['id']))
        {            
            $id = $_GET['id'];
            $tabla = 'Venta';
            $arlistado = $controlador->BuscarDatoLista($tabla, $id);
            
            for($j=0; $j<(sizeof ($arlistado)); $j++)
            {        
                if ($arlistado[$j][0] == 'CLIENTE')
                {   
                    array_push($arclientes,$arlistado[$j][1]);
                    array_push($arclientes,$arlistado[$j][2]);
                }           
                elseif ($arlistado[$j][0] == 'PRODUCTO')
                {            
                    $nombre =$arlistado[$j][1];
                    $precio_compra =$arlistado[$j][2];
                    $precio_venta =$arlistado[$j][3];
                    $categoria =$arlistado[$j][4];
                    $stock=$arlistado[$j][5];
                }        
            } 
            $_SESSION['ListadoClientes']=  $arclientes;                          
        }

        if ( !empty($_POST)) { 
             $id =trim(INPUT_POST, 'itCampoClave');
             $stock = $_POST['itStock'];
             $cantidad=$_POST['itCantidad'];    
             $cliente=$_POST['SlClientes'];    
             $total=$_POST['itTotal'];
             $montocancelado=$_POST['itMonto_Cancelado'];        
             Controlador_Venta::Grabar_Venta();        
           }
        ?>

    <form name="formVentas" action="../Vistas/Ventas.php" method="POST">
        <div>
           <div id="popup-head-color2" align="center">
           <p> Transaccion Venta</p>
        </div>
        <br>
             <input id="itCampoClave" name="itCampoClave" type="hidden"  value="<?php echo !empty($id)?$id:0;?>"/>
             <input id="itStock" name="itStock" type="hidden" value="<?php echo !empty($stock)?$stock:0;?>"/>
             <input id="itPrecioCompra" name="itPrecioCompra" type="hidden" value="<?php echo !empty($precio_compra)?$precio_compra:'';?>"/>
        
             <table border="0" align="center">  

        <tr>
        <td align="left"> Fecha Actual</td>
        <td align="left"> <input type="text" name="itFecha" id="itFecha" value="<?php echo "  ". date("Y/m/d")?>" readonly/> </td>
        </tr>

        <tr>
           <td align="left">Clientes:</td>
            <td align="left">
                <select name="SlClientes" id="SlClientes">
                        <?php for($i=0; $i<(sizeof ($_SESSION['ListadoClientes'])); $i++){ ?>
                        <option value="<?php echo $_SESSION['ListadoClientes'][$i];  ?>"                        
                                      ><?php $i++; echo $_SESSION['ListadoClientes'][$i]; } ?>
                        </option>                             
                </select>
            </td>
        </tr>         

        <tr>
        <td align="left">Categoria</td>
        <td align="left"><input type="text" id="itCategoria" name="itCategoria" value="<?php echo $categoria;?>" readonly/><br></td>
        </tr>

        <tr>
        <td align="left">Nombre Producto</td>
        <td align="left"><input type="text" id="itNombre" name="itNombre" value="<?php echo $nombre;?>" readonly/><br></td>
        </tr>



        <tr>
        <td align="left">Precio Venta</td>
            <td align="left">
                <input type="text" 
                       id="itPrecioVenta" 
                       name="itPrecioVenta" 
                       value="<?php echo !empty($precio_venta)?$precio_venta:'';?>" 
                       readonly/>
                <br>
            </td>
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
                       placeholder="Cantidad" 
                       required
                       onkeypress="return ValidarNumeros(event)" 
                       onkeydown="return AnularPegado(event)"/>
                    <br>
            </td>
        </tr>

        <tr>
        <td align="left">Monto Total a Pagar</td>
        <td align="left"><input type="text" id="itTotal" name="itTotal" value="" readonly/></td>
        <td align="left"><input type="button" value="Calcular Total" onclick="CalcularTotal();"/></td>
        </tr>

        <tr>
        <td align="left">Ganancia</td>
        <td align="left"><input type="text" id="itGanancia" name="itGanancia" value="" readonly/><br></td>
        </tr>


        <tr>
        <td align="left">Monto Cancelado *</td>
        <td align="left">
            <input type="text" 
                   id="itMonto_Cancelado" 
                   name="itMonto_Cancelado" 
                   value="<?php echo !empty($montocancelado)?$montocancelado:'';?>"
                   placeholder="Monto Recibido"
                   onkeypress="return ValidarNumeros(event)" 
                   onkeydown="return AnularPegado(event)"/>
        </td>
        <td align="left"><input type="button" value="Calcular Cambio" onclick="CalcularDevolucion();"/></td>
        </tr>

        <tr>
        <td align="left">Cambio</td>
        <td align="left"><input type="text" id="itCambio" name="itCambio" value="" readonly/></td>
        </tr>


        <br>
        <tr  align="center">
        <td>&nbsp;  </td>
        <td>
        <br>
            <input type="submit" id="btnnav" value="Agregar" onmousedown="return ValidarDatos();"/>
            <a href="Listado_Ventas.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"/></a>

        </td>
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
