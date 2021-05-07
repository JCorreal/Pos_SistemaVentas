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
                                                 echo strftime("%d de %B de %Y");   
                                                 date_default_timezone_set('America/Bogota');
                                                 $now = date_create()->format('h:iA');
                                                 echo ' '. $now;
                                            ?>
                                        </th>
                                        <th scope="col" width="20px">
                                            <a href="../BLL/logout.php">
                                                <input type="button" id="btnnav" value="Cerrar Sesión" align="middle"/>
                                            </a>
                                        </th>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>

                <br></br><br></br>
                                    
               
            </div>
    </body>
</html>
