<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">         
          <title>Sistema Punto de Venta</title>
          <link href="Estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <?php session_start(); ?>        
    
    <body>
            <div id="container">
                <div id="header">
                    <table cellspacing="0" width="100%" border="0" cellpadding="20px">
                        <tr>
                            <td width="56%">
                                <table width="41%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="80%" align="left"> <span style="font-size: 18px;">Punto De Venta</span></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-size:14px;">
                                <table width="93%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th scope="col">Bienvenido: <?php echo $_SESSION['User_Name'];?></th>
                                        <th scope="col">
                                            <?php                                                  
                                                 setlocale(LC_TIME, 'spanish'); 
                                                 echo strftime("%A %d de %B del %Y");                                            
                                            ?>
                                        </th>
                                        <th scope="col" width="20px">
                                            <a href="../BLL/logout.php">
                                                <input type="button" id="btnadd" value="Cerrar Sesión" align="middle"/>
                                            </a>
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>

                <br><br><br><br><br>
                                    
                <div id = "headnav"> 
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                           <?php
                            if($_SESSION['PerfilAcceso']==1){?>
                            
                            <td width="1053" height="62">
                                <table width="669" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th width="50" scope="col"><a href="../Vistas/Menu.php">Tablero</a></th>
                                        <th width="50" scope="col"><a href="../Vistas/Listado_Clientes.php">Clientes</a></th>
                                        <th width="50" scope="col"><a href="../Vistas/Listado_Categorias.php">Categorias</a></th>                                       
                                        <th width="50" scope="col"><a href="../Vistas/Listado_Proveedores.php">Proveedores</a></th>
                                        <th width="50" scope="col"><a href="../Vistas/Listado_Productos.php">Productos</a></th>                                       
                                        <th width="50" scope="col"><a href="../Vistas/Listado_Ventas.php">Ventas</a></th>
                                        <th width="100" scope="col"><a href="../Vistas/ReporteVentas.php">Reporte Ventas</a></th>
                                    </tr>
                                </table>
                            </td>

                            <?php }?>
                            <td width="13">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="left" style="color:#FFF">
                                            <?php                                                
                                                date_default_timezone_set('America/Bogota');
                                                $now = date_create()->format('h:iA');
                                                echo $now;
                                            ?>                                        
                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    </table>
                </div>
                <br><br><br><br>


            </div>
    </body>
</html>
