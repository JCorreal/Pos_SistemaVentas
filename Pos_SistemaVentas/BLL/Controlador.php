<?php            
     require_once '../DAL/AccesoDatos.php';       
     
class Controlador {
 
    protected $iAccesoDatos;    
        
    public function __construct(IAccesoDatos $iaccesodatos)
    {
        $this->iAccesoDatos=new AccesoDatos();
    }             
    
    public function ObtenerAcceso($username, $clave)
    {
        return $this->iAccesoDatos->ObtenerAcceso($username, $clave);        
    }
    
    public function ObtenerProveedor($datobuscar)
    {
        return $this->iAccesoDatos->ObtenerProveedor($datobuscar);        
    }
    
    public function ObtenerCategoria($datobuscar)
    {
        return $this->iAccesoDatos->ObtenerCategoria($datobuscar);        
    }
    
    public function ObtenerCliente($datobuscar)
    {
        return $this->iAccesoDatos->ObtenerCliente($datobuscar);        
    }
    
    public function ObtenerProducto($datobuscar)
    {
        return $this->iAccesoDatos->ObtenerProducto($datobuscar);        
    }
    
    public function BuscarDatoLista($tabla, $datobuscar)
    {
        return $this->iAccesoDatos->BuscarDatoLista($tabla, $datobuscar);
    }
    
    public function CargarCombos($tabla)
    {
        return $this->iAccesoDatos->CargarCombos($tabla);
    }
    
    public function GrabarProveedor($Object)
    {        
       return $this->iAccesoDatos->GrabarProveedor($Object);
    }
    
    public function GrabarCategoria($Object)
    {        
       return $this->iAccesoDatos->GrabarCategoria($Object);
    }
    
    public function GrabarCliente($Object)
    {        
       return $this->iAccesoDatos->GrabarCliente($Object);
    }
    
    public function GrabarProducto($Object)
    {        
       return $this->iAccesoDatos->GrabarProducto($Object);
    }

    public function GrabarVenta($Object) 
    {        
       return $this->iAccesoDatos->GrabarVenta($Object);
    }
    
    public function EliminarRegistro($tabla, $dato)
    {        
       return $this->iAccesoDatos->EliminarRegistro($tabla, $dato);
    }

}
