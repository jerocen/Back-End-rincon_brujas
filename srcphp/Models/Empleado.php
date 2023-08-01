<?php

use proyecto\Models\Models;

class Empleado extends Models
{
      public $id;
      public $nombre;
      public $correo;
      public $contrasenia;
      public $rol;

      /**
     * @var array
     */

      protected $table = "empleado";
      protected $filleable = ["id", "nombre", "correo", "contrasenia", "rol"];
}

?>