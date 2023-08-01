<?php
namespace proyecto\Controller;

use proyecto\Response\Failure;
use proyecto\Response\Success;
use proyecto\Models\Producto;
use proyecto\Models\Table;

class ProductoController
{
      public function InsertProducto()
      {
            try
            {
                  $JSONData = file_get_contents("php://input");
                  $dataObject = json_decode($JSONData);
                  $product = new Producto();
                  $product->nom_producto = $dataObject->nom_producto;
                  $product->precio = $dataObject->precio;
                  $product->existencias = $dataObject->existencias;
                  $product->talla = $dataObject->talla;
                  $product->color = $dataObject->color;
                  $product->categoria = $dataObject->categoria;
                  $product->imagen = $dataObject->imagen;
                  $product->save();
                  $respuesta = new Success($product);

                  return $respuesta->Send();
            }
            catch(\Exception $e)
            {
                  $respuesta = new Failure(401, $e->getMessage());
                  return $respuesta-> Send();
            }
      }
      public function selectproducto()
      {
                  $productos = Producto::all();
                  $respuesta = new Success($productos);
                  $respuesta->Send();
      }

      public function productoid($id)
      {
            $producto = Producto::find($id);
            $respuesta = new Success($producto);
            $respuesta->Send();
      }

      public function guardarProducto()
      {
            $product = new Producto();
                  $product->nom_producto ="blusa";
                  $product->precio = 200;
                  $product->existencias = 34;
                  $product->talla = "mediano";
                  $product->color = "rojo";
                  $product->categoria = 13010005;
                  $product->imagen = "";
                  $product->save();
                  $respuesta = new Success($product);
                  return $respuesta->Send();
      }

      public function verproducto()
      {
            $tabla=Table::query("select producto.id, producto.nom_producto, producto.precio, producto.existencias, producto.talla, producto.color, categoria.nombre from  producto INNER JOIN categoria on producto.categoria = categoria.id");
            $res = new Success($tabla);
            return $res->Send();
      }
}