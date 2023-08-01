<?php
namespace proyecto\Models;
use proyecto\Models\Models;

class Orden_venta extends Models
{
      public $id;
      public $forma_pago;
      public $cliente;
      public $fecha;

      /**
     * @var array
     */

      protected $filleable = ["id", "forma_pago", "cliente", "fecha"];
      protected $table = "orden_venta";
}

?>