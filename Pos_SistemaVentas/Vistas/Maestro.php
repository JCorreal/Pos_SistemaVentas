<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
          <title>Sistema Punto de Venta</title>
          <link href="Estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <?php session_start(); ?>        
    
    <body>
          <div id="header">
              Punto de Venta &nbsp; &nbsp; <?php  echo date('d-m-Y H:i'); ?>     
              <div align="right">
                  Bienvenido: <?php echo $_SESSION['User_Name'];?> 
                  <a href="../BLL/logout.php">
                     <input type="button" id="btnnav" value="Cerrar Sesión"/>
                  </a>
              </div>
          </div>  
          <br></br><br></br>
    </body>
</html>
