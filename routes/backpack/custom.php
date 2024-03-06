<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('area', 'AreaCrudController');
    Route::crud('cartera', 'CarteraCrudController');
    Route::crud('empresa', 'EmpresaCrudController');
    Route::crud('plan-desarrollo', 'PlanDesarrolloCrudController');
    Route::crud('producto', 'ProductoCrudController');
    Route::crud('programa', 'ProgramaCrudController');
    Route::crud('sector', 'SectorCrudController');
    Route::crud('sub-programa', 'SubProgramaCrudController');
    Route::crud('tipo-producto', 'TipoProductoCrudController');
    Route::crud('unidad-medida', 'UnidadMedidaCrudController');
}); // this should be the absolute last line of this file