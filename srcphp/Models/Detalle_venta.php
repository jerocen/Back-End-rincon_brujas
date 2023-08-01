<?php
namespace proyecto\Models;
use proyecto\Models\Models;

class Detalle_venta extends Models
{
      public $orden_venta_id;
      public $producto;
      public $cantidad;

      /**
     * @var array
     */

      protected $filleable = ["orden_venta_id", "producto", "cantidad"];
      protected $table = "detalle_venta";
}
?>