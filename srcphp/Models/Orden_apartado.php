<?php
namespace proyecto\Models;
use proyecto\Models\Models;

class Orden_apartado extends Models
{
      public $id;
      public $fecha;
      public $cliente;
      public $contacto;
      public $forma_pago;
      public $total_pagar;
      public $estado;
      public $abono;

      /**
     * @var array
     */

      protected $filleable = ["id", "forma_pago", "cliente", "fecha", "contacto", "total_pagar", "estado", "abono"];
      protected $table = "orden_venta";
}

?>