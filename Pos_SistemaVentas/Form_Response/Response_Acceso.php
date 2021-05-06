<?php   
    
class Response_Acceso{     
     
    public static function acceso_Sistema()
    {
      $username = filter_input(INPUT_POST, 'itUsername', FILTER_SANITIZE_STRING);
      $clave = filter_input(INPUT_POST, 'itClave', FILTER_SANITIZE_STRING);
      $nivel = NULL;    
      if (($username!= NULL) && ($clave!= NULL)) 
      {  
          $controlador = Funciones::crearControlador_Usuario();
          $nivel = $controlador->obtenerAcceso($username, $clave);
          if ($nivel != NULL)
          {  
                $_SESSION['User_Name'] = $username;
		$_SESSION['PerfilAcceso'] = $nivel; 
                if ($nivel == 1)
                { 
                    header('location: ../Vistas/Menu.php');
                }
                else 
                {
                    header('location: ../Vistas/Listado_Ventas.php');                    
                }
	  }
          else
          {
              ?>
                <script type="text/javascript">
                        alert("Usuario o Clave, no son validos");
                        window.location.href = "../Vistas/index.php";
                </script>
              <?php	
          }
      } 
    }
    
}
