<?php
namespace proyecto\Controller;

use proyecto\Response\Failure;
use proyecto\Response\Success;
use proyecto\Models\Orden_apartado;
use proyecto\Models\Detalle_apartado;
use proyecto\Models\Table;

class Orden_ApartadoController
{
      public function InsertarOrdenVenta()
      {
            try
            {
                  $JSONData = file_get_contents("php://input");
                  $dataObject = json_decode($JSONData);
                  $det_apar = new Detalle_apartado();
                  $ord_apar = new Orden_apartado();
                  $ord_apar->forma_pago = $dataObject->forma_pago;
                  $ord_apar->cliente = $dataObject->cliente;
                  $ord_apar->fecha = $dataObject->fecha;
                  $ord_apar->contacto = $dataObject->contacto;
                  $ord_apar->total_pagar = $dataObject->total_pagar;
                  $ord_apar->estado = $dataObject->estado;
                  $ord_apar->abono = $dataObject->abono;
                  $det_apar->producto = $dataObject->producto;
                  $det_apar->cantidad = $dataObject->cantidad;
                  $det_apar->save();
                  $respuesta = new Success($det_apar);
                  $ord_apar->save();
                  $respuesta = new Success($ord_apar);
            }
            catch(\Exception $e)
            {
                  $respuesta = new Failure(401, $e->getMessage());
                  return $respuesta-> Send();
            }
      }

      public function SelectOrdenApartado()
      {
            $tabla=Table::query("select orden_apartado.id as ID_APARTADO, 
            producto.nom_producto, detalle_apartado.cantidad, orden_apartado.
            cliente, orden_apartado.forma_pago, orden_apartado.fecha, 
            orden_apartado.contacto, orden_apartado.total_pagar, 
            orden_apartado.estado, orden_apartado.abono from orden_apartado
            inner join detalle_apartado on orden_apartado.id = detalle_apatado.
            orden_apartado_id inner join producto on detalle_apartado.producto = 
            producto.id");
            $res = new Success($tabla);
            return $res->Send();
      }
}
?>