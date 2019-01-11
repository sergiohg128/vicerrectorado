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
Route::get('/publicacion','Controlador@publicacion');

Route::get('/proyectos','Controlador@proyectos');
Route::get('/proyecto','Controlador@proyecto');

Route::get('/admin', function (){
    return redirect("/admin/");
});


Route::get('/admin/','ControladorAdmin@index');
Route::post('/admin/login','ControladorAdmin@login');
Route::get('/admin/logout','ControladorAdmin@logout');
Route::get('/admin/inicio','ControladorAdmin@inicio');

Route::get('/admin/menus','ControladorAdmin@menus');
Route::get('/admin/menu-formulario','ControladorAdmin@menuformulario');
Route::post('/admin/menu-formulario','ControladorAdmin@menuformularioPost');

Route::get('/admin/noticias','ControladorAdmin@noticias');
Route::get('/admin/noticia-formulario','ControladorAdmin@noticiaformulario');
Route::get('/admin/pasantias','ControladorAdmin@pasantias');
Route::get('/admin/pasantia-formulario','ControladorAdmin@pasantiaformulario');
Route::get('/admin/financiamientos','ControladorAdmin@financiamientos');
Route::get('/admin/financiamiento-formulario','ControladorAdmin@financiamientoformulario');
Route::get('/admin/documentos','ControladorAdmin@documentos');
Route::get('/admin/documento-formulario','ControladorAdmin@documentoformulario');

Route::post('/admin/publicacion-formulario','ControladorAdmin@publicacionformulario');