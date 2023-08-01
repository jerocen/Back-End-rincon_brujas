<?php

namespace proyecto;
require("../vendor/autoload.php");

use proyecto\Response\Failure;
use proyecto\Response\Success;

use proyecto\Controller\CategoriaController;
use proyecto\Controller\orden_apartadoController;
use proyecto\Controller\ProductoController;
use proyecto\Controller\Orden_ventaController;

Router::post('/categoria/insert', [CategoriaController::class, "InsertCategoria"]);
Router::get('/categoria/select',[CategoriaController::class, "selectcategoria"]);
Router::put('/categoria/delete', [CategoriaController::class, 'deletecategoria']);

Router::get('/ordenventa/select', [Orden_ventaController::class, 'SelectOrdenVenta']);

Router::get('/ordenapartado/select', [orden_apartadoController::class, 'SelectOrdenApartado']);

Router::get('/vista/ReporteVentas', Orden_ventaController::class, 'ReporteVentas');
Router::get('/vista/ProductosVendPorCateg', Orden_ventaController::class, 'ProductosVendidosPorCategoria');
Router::get('/vista/ExistMaymen', Orden_ventaController::class, 'ExistenciasMayorMenor');
Router::get('/vista/ExistMayProm', Orden_ventaController::class, 'ProductosPrecioMayorPromedio');
Router::get('/vista/ExistMenProm', Orden_ventaController::class, 'ProductosPrecioMenorPromedio');
Router::get('/vista/ReporteApartados', Orden_ventaController::class, 'ReporteApartado');
Router::get('/vista/ProdSinvend', Orden_ventaController::class, 'ProductosNoVendidos');
Router::get('/vista/MontTotPorOrdVent', Orden_ventaController::class, 'ReporteMontoTotal');
Router::get('/vista/CantProdVend', Orden_ventaController::class, 'ProductosNoVendidosPorCategoria');
Router::get('/vista/ProdNoVendPorCateg', Orden_ventaController::class, 'CantidadProductosVendidos');

Router::get('/producto/guardar',[ProductoController::class,"guardarProducto"]);

Router::get('/producto/verproducto',[ProductoController::class, "verproducto"]);

Router::get('/producto/select',[ProductoController::class, "selectproducto"]);

Router::get('/ProductoController/InsertProducto',[ProductoController::class, "ProductoController"]);
Router::get('/ProductoController/SelectProducto',[ProductoController::class, "ProductoController"]);
Router::get('/Producto/$id',[ProductoController::class, 'productoid']);
Router::get('/prueba',[ProductoController::class,"MostrarProducto"]);
Router::post('/producto/insertar',[ProductoController::class, 'InsertProducto']);


// Router::get('/usuario/buscar/$id', function ($id) {

//     $user= User::find($id);
//     if(!$user)
//     {
//         $r= new Failure(404,"no se encontro el usuario");
//         return $r->Send();
//     }
//    $r= new Success($user);
//     return $r->Send();


// });

Router::any('/404', '../views/404.php');
