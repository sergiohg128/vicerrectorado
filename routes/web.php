<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
});


Route::get('/', function (){
    return redirect("/index");
});

Route::get('/index','Controlador@index');
Route::get('/oficina','Controlador@oficina');
Route::get('/pasantias','Controlador@pasantias');
Route::get('/financiamientos','Controlador@financiamientos');
Route::get('/docs','Controlador@docs');