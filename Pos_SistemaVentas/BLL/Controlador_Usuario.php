<?php   
     session_start();  
     
 
class Controlador_Usuario{     
     
    protected $idao_usuario;     
       
    public function __construct(IDao_Usuario $idao_usuario)
    {
        $this->idao_usuario = new Dao_Usuario();
    }
    
    public function obtenerAcceso($username, $clave) 
    {          
        return $this->idao_usuario->obtenerAcceso($username, $clave);  
        
    }
}
