<?php
 
interface IDao_Venta {   
   public function grabarVenta($venta);
   public function buscar();
   public function hacerPedido($datobuscar);
   public function reporte($fechainicio, $fechafin);
}
