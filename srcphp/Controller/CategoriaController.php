<?php
namespace proyecto\Controller;

use proyecto\Response\Failure;
use proyecto\Response\Success;
use proyecto\Models\Categoria;
use proyecto\Models\Table;

class CategoriaController
{
      public function InsertCategoria()
      {
            try
            {
                  $JSONData = file_get_contents("php://input");
                  $dataObject = json_decode($JSONData);
                  $categoria = new Categoria();
                  $categoria->nombre = $dataObject->nombre;
                  $categoria->save();
                  $respuesta = new Success($categoria);

                  return $respuesta->Send();
            }
            catch(\Exception $e)
            {
                  $respuesta = new Failure(401, $e->getMessage());
                  return $respuesta-> Send();
            }
      }

      public function selectcategoria()
      {
            $tabla=Table::query("select categoria.id, categoria.nombre from categoria where categoria.state =1");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function deletecategoria()
      {
            $tabla=Table::query("update categoria set categoria.state = 0");
            $res = new Success($tabla);
            return $res->Send();
      }
}
?>