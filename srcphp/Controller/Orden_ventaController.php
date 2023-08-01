<?php
namespace proyecto\Controller;

use proyecto\Response\Failure;
use proyecto\Response\Success;
use proyecto\Models\Orden_venta;
use proyecto\Models\Detalle_venta;
use proyecto\Models\Table;

class Orden_ventaController
{
      public function InsertarOrdenVenta()
      {
            try
            {
                  $JSONData = file_get_contents("php://input");
                  $dataObject = json_decode($JSONData);
                  $det_vent = new Detalle_venta();
                  $ord_vent = new Orden_venta();
                  $ord_vent->forma_pago = $dataObject->forma_pago;
                  $ord_vent->cliente = $dataObject->cliente;
                  $ord_vent->fecha = $dataObject->fecha;
                  $det_vent->producto = $dataObject->producto;
                  $det_vent->cantidad = $dataObject->cantidad;
                  $det_vent->save();
                  $respuesta = new Success($det_vent);
                  $ord_vent->save();
                  $respuesta = new Success($ord_vent);
            }
            catch(\Exception $e)
            {
                  $respuesta = new Failure(401, $e->getMessage());
                  return $respuesta-> Send();
            }
      }

      public function SelectOrdenVenta()
      {
            $tabla=Table::query("select orden_venta.id as ID_VENTA, producto.nom_producto, 
            detalle_venta.cantidad, orden_venta.cliente, orden_venta.
            forma_pago, orden_venta.fecha from orden_venta inner join 
            detalle_venta on orden_venta.id = detalle_venta.orden_venta_id inner 
            join producto on detalle_venta.producto = producto.id");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ReporteVentas()
      {
            $tabla=Table::query("select * from productos_vendidos_x_fecha");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ProductosVendidosPorCategoria()
      {
            $tabla=Table::query("select * from productos_vendidos_X_cat_may_men");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ExistenciasMayorMenor()
      {
            $tabla=Table::query("select * from exis_pro_may_men");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ProductosPrecioMayorPromedio()
      {
            $tabla=Table::query("select * from productos_precio_mayor_prom");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ProductosPrecioMenorPromedio()
      {
            $tabla=Table::query("select * from productos_precio_menor_prom");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ReporteApartado()
      {
            $tabla=Table::query("select * from reporte_apartados");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ProductosNoVendidos()
      {
            $tabla=Table::query("select * from productos_no_vendidos");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ReporteMontoTotal()
      {
            $tabla=Table::query("select * from reporte_monto_total_x_ord_venta");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function ProductosNoVendidosPorCategoria()
      {
            $tabla=Table::query("select * from productos_no_vend_x_categoria");
            $res = new Success($tabla);
            return $res->Send();
      }

      public function CantidadProductosVendidos()
      {
            $tabla=Table::query("select * from cant_prod_vendidos");
            $res = new Success($tabla);
            return $res->Send();
      }
}
?>