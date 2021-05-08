<?php     
   
class Controlador_Categoria {
   
    protected $idao_categoria;
        
    public function __construct(IDao_Categoria $idao_categoria)
    {
        $this->idao_categoria = new Dao_Categoria();
    }
        
    public function obtenerCategoria($datoBuscar)
    {
       return $this->idao_categoria->obtenerCategoria($datoBuscar);
    }
    
    public function buscar($datobuscar)
    {
        return $this->idao_categoria->buscar($datobuscar);
    }
    
    public function grabarCategoria ($object)
    {     
      return $this->idao_categoria->grabarCategoria($object);
    }
         
    public function eliminarCategoria($datoBuscar){        
        return $this->idao_categoria->eliminarCategoria($datoBuscar);
    }

     
}
