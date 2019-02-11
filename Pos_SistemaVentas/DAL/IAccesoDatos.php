<?php

interface IAccesoDatos {
   
   public function ObtenerAcceso($username, $clave); 
   public function ObtenerCategoria($buscardato);
   public function ObtenerProducto($datobuscar);
   public function ObtenerProveedor($datobuscar);
   public function ObtenerCliente($datobuscar);
   public function BuscarDatoLista($tabla, $datobuscar); 
   public function CargarCombos($tabla);
   public function GrabarCategoria($categoria);
   public function GrabarProveedor($proveedor);
   public function GrabarProducto($producto);
   public function GrabarCliente($cliente);
   public function GrabarVenta($venta);
   public function EliminarRegistro($tabla, $datobuscar);

}
