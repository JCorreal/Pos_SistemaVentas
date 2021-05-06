<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Acceso Sistema De Venta</title>
            <link href="Estilo.css" rel="stylesheet" type="text/css"/>
            <script type="text/javascript">
                    function ActivarPopup(id)
                    {
                        var e = document.getElementById(id);
                        if(e.style.display==='block')
                           e.style.display = 'none';
                        else
                            e.style.display = 'block';
                    }
            </script>
    </head>

  <body style=" background:url(../resources/imagenes/restaurante.jpg) no-repeat center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
       <?php         
            require_once '../BLL/AutoLoader.php';             
            spl_autoload_register();
            if (filter_input_array(INPUT_POST))    
            { 
                Response_Acceso::acceso_Sistema();
            }            
        ?>
   <form name="formIndex" action="index.php" method="POST">    
    <div id = "container">    
        <div id = "header">
            <table border="0" cellspacing="10px" width="100%" cellpadding="5px">
                <tr>
                    <td width="80%" align="left"> <font size="10px">Punto De Venta</td>
                    <td width="10%">&nbsp;</td>
                    <td width="10%" align="right">
                        <a href="javascript:void(0)" 
                           onclick="ActivarPopup('popup-box1')">
                           <input type="button" id="btnadd" value="Ingresar">
                        </a>
                    </td>
                    <td width="0%">&nbsp;</td>
                </tr>
            </table>
        </div>

        <div id="popup-box1" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <div id="popup-head-color3">
                         </br > <p> Acceso Punto de Venta </p>
                    </div>
            
                    <br></br><br></br>

                    <table border="0" align="center">
                            <tr>
                                <td>Usuario *</td>
                                <td align="center"><input type="text" id="itUsername" name="itUsername" value="" placeholder="Usuario" required></td>
                            </tr>

                            <tr>
                                <td>Clave *</td>
                                <td align="center"><input type="password" id="itClave" value="" name="itClave" placeholder="Clave" required></td>
                            </tr>
                            
                            <tr>
                                 <td> &nbsp; </td>
                                 <td  align="left"><input type="submit" id="btnnav" value="Ingresar"></td>
                            </tr>
                    </table>   
                </div>
            </div>
        </div>
    </div>
  </form>
 </body>              
</html>
