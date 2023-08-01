<?php
namespace proyecto\Models;
use proyecto\Models\Models;
use proyecto\Response\Success;

class Categoria extends Models
{
      public $id;
      public $nombre;

      /**
     * @var array
     */
    protected $table = "categoria";
    protected $filleable = ["id", "nombre"];
}
?>