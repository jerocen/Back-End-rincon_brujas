<?php
namespace proyecto\Models;
use proyecto\Models\Models;
use proyecto\Response\Success;

class Producto extends Models
{
      public $id;
      public $nom_producto;
      public $precio;
      public $existencias;
      public $talla;
      public $color;
      public $categoria;
      public $imagen;

      /**
     * @var array
     */

     protected $table = "producto";
     protected $filleable = ["id", "nom_producto", "precio", "existencias", "talla", "color", "categoria" , "imagen"];
}
?>