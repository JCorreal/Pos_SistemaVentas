<?php 
    /* Esto solo funciona en versiones superiores de PHP 5. 
       spl_autoload_register nos facilita la vida para evitar la pesadilla 
       de incluir todos los archivos, que requieren las aplicaciones */

    spl_autoload_register(function ($className) {
    $path = "../BLL/$className.php";
    
     if (file_exists($path)) {
         require $path;         
     }
     else
     {
        $path = "../DAL/$className.php";
        if (file_exists($path)) {
         require $path;
        }
        else
        { 
           $path = "../Form_Response/$className.php";
           if (file_exists($path)) {
            require $path;
           }
           else
           {
             $path = "../BO/$className.php";
              if (file_exists($path)) {
                require $path;
               }
               else
               {
                 $path = "../Vistas/$className.php";
                 if (file_exists($path)) {
                    require $path;
                  }         
                  else
                  {
                      throw new Exception(sprintf('Clase no hallada.', $className, $path ));
                  }
               }
           }
        }
     }
});
