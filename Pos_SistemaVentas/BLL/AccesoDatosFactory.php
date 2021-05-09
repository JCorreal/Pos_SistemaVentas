<?php     

class AccesoDatosFactory {
            
    public static function obtenerDao_Categoria(IDao_Categoria $idao_categoria)
    {
        return new Dao_Categoria();
    }
    
    public static function obtenerDao_Cliente(IDao_Cliente $idao_cliente)
    {
        return new Dao_Cliente();
    }    
    
    public static function obtenerDao_Producto(IDao_Producto $idao_producto)
    {
        return new Dao_Producto();
    }
    
    public static function obtenerDao_Proveedor(IDao_Proveedor $idao_proveedor)
    {
        return new Dao_Proveedor();
    }
        
    public static function obtenerDao_Usuario(IDao_Usuario $idao_usuario)
    {
        return new Dao_Usuario();
    }
    
    public static function obtenerDao_Venta(IDao_Venta $idao_venta)
    {
        return new Dao_Venta();
    }
    
}
