<?php

 
class Dao_Categoria extends Dao_General implements IDao_Categoria{
       
  public function obtenerCategoria($buscardato)
  {  
    try
    {
       $vecr = parent::buscarRegistro('tbl_Categorias', $buscardato);
       if ($vecr!= NULL)
       {
         $categoria = new Categoria();
         $categoria->setCategoria_id($vecr[0][0]);
         $categoria->setNombre($vecr[0][1]);
         unset($vecr);
         return $categoria;
       }
       else
       {
          return NULL;
       }
   }
   catch (Exception $ex)
   {
       echo $ex;
   }
  }

  public function buscar($buscardato)
  {
     $Lista = array();    
     $Lista =  parent::buscarDatoLista('tbl_categorias', $buscardato);
     return $Lista;
  }
  
  public function grabarCategoria($categoria)
  {      
     $cn = Conexion::obtenerConexion();  
     try
     {         
        $cn->query("SET @result = 1");
        $cn->query("CALL SPR_IU_Categorias('" . $categoria->getCategoria_id() . "', 
                                           '" . $categoria->getNombre() . "',                                            
                                           @result)");

        $res = $cn->query("SELECT @result AS result");
        $row = $res->fetch_assoc();
        mysqli_close($cn);
        return $row['result'];
     }
     catch (Exception $ex)
     {
       mysqli_close($cn);
       echo $ex;
     }  
  }

    public function eliminarCategoria($datoEliminar) {
      $result = parent::eliminarRegistro("tbl_categorias", $datoEliminar);
      return $result;
    }

}
