<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <link rel="stylesheet" type="text/css" href="Estilo.css">
          <title>Respuesta</title>
    </head>

  <body>
        <div id="container"> 
            <div id="header">    
                 <a href="../Vistas/Menu.php"><img src="../resources/imagenes/Inicio.jpg" alt="" /></a>
            </div>
        </div> 
        <br></br>   

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
              </table>
        </form>     
  </body>
</html>
