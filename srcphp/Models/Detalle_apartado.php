<?php
namespace proyecto\Models;
use proyecto\Models\Models;

class Detalle_apartado extends Models
{
      public $orden_apartado_id;
      public $producto;
      public $cantidad;

      /**
     * @var array
     */

      protected $filleable = ["orden_apartado_id", "producto", "cantidad"];
      protected $table = "detalle_apartado";
}
?>