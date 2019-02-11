<?php   
     session_start();  
     require_once '../BLL/Funciones.php';
 
class Controlador_Acceso{     
     
    public static function Acceso_Sistema()
    {
     $username=$_POST['itUsername'];
     $clave=$_POST['itClave'];

      $nivel = NULL;    
      if (($username!= NULL) && ($clave!= NULL)) 
      {  
          $controlador = Funciones::CrearControlador();
          $nivel = $controlador->ObtenerAcceso($username, $clave);
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
