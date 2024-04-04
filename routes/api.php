<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ExistenciaController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TipoCambioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//ALMACEN
Route::apiResource('/almacenes', AlmacenController::class);
Route::post('/almacenes/consultar', [AlmacenController::class,'consultar'])->name('almacenes.consultar');
//CLIENTE
Route::apiResource('/clientes', ClienteController::class);
Route::post('/clientes/consultar', [ClienteController::class,'consultar'])->name('clientes.consultar');
//COMPRA
Route::apiResource('/compras', CompraController::class);
Route::post('/compras/consultar', [CompraController::class,'consultar'])->name('compras.consultar');
//DETALLECOMPRA
Route::apiResource('/detallecompras', DetalleCompraController::class);
Route::post('/detallecompras/consultar', [DetalleCompraController::class,'consultar'])->name('detallecompras.consultar');
//DETALLEVENTA
Route::apiResource('/detalleventas', DetalleVentaController::class);
Route::post('/detalleventas/consultar', [DetalleVentaController::class,'consultar'])->name('detalleventas.consultar');
//EMPRESA
Route::apiResource('/empresas', EmpresaController::class);
Route::post('/empresas/consultar', [EmpresaController::class,'consultar'])->name('empresas.consultar');
//EXISTENCIA
Route::apiResource('/existencias', ExistenciaController::class);
Route::post('/existencias/consultar', [
    ExistenciaController::class,'consultar'])->name('existencias.consultar');
//FORMAPAGO
Route::apiResource('/formapago', FormaPagoController::class);
Route::post('/formapago/consultar', [FormaPagoController::class,'consultar'])->name('formapago.consultar');
//ITEMS
Route::apiResource('/items', ItemController::class);
Route::post('/items/consultar', [ItemController::class,'consultar'])->name('items.consultar');
Route::post('/items/uploadimage', [ItemController::class,'uploadimage'])->name('items.uploadimage');
//Route::put('/items/{item}/uploadimage', [ItemController::class,'uploadimage'])->name('items.uploadimage');
//MONEDA
Route::apiResource('/monedas', MonedaController::class);
Route::post('/monedas/consultar', [MonedaController::class,'consultar'])->name('monedas.consultar');
//PERFILES
Route::apiResource('/perfils', PerfilController::class);
Route::post('/perfils/consultar', [PerfilController::class,'consultar'])->name('perfils.consultar');
//PROVEEDORES
Route::apiResource('/proveedores', ProveedorController::class);
Route::post('/proveedores/consultar', [ProveedorController::class,'consultar'])->name('proveedores.consultar');
//TIPOCAMBIOS
Route::apiResource('/tipocambios', TipoCambioController::class);
Route::post('/tipocambios/consultar', [TipoCambioController::class,'consultar'])->name('tipocambios.consultar');
//USERS
Route::apiResource('/users', UserController::class);
Route::post('/users/consultar', [UserController::class,'consultar'])->name('users.consultar');
Route::post('/users/registerOnApi', [UserController::class,'registerOnApi'])->name('users.registerOnApi');
Route::post('/users/loginOnApi', [UserController::class,'loginOnApi'])->name('users.loginOnApi');
//Route::post('/items/uploadimage', [ItemController::class,'uploadimage'])->name('items.uploadimage');
//VENTAS
Route::apiResource('/ventas', VentaController::class);
Route::post('/ventas/consultar', [VentaController::class,'consultar'])->name('ventas.consultar');