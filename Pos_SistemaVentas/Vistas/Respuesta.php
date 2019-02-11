<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <link rel="stylesheet" type="text/css" href="Estilo.css">
          <title>Respuesta</title>
    </head>

<body>
 
            <form name="formRespuesta">                  
                
                
                <br></br>
                <table border="0" align="center"> 
                <div align="center">
                    <input type="text" 
                           id="itMensajeError" 
                           name="itMensajeError" 
                           readonly="true"
                           size="50"
                           style=" border-style: none; color: red; background: white"
                           value="<?php echo filter_input(INPUT_GET,'mensaje'); ?>"/>         
                </div>
                <br></br>
                <div align="center">
                    <a href="../Vistas/Menu.php" style="font-size:20px; color: blue;">&nbsp;Regresar Menu</a>
                </div>    
                <br></br>
                </table>
            </form>     
</body>
</html>
