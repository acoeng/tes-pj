<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/barang', 'Barang@getAllRecord'); 
$app->get('/barang/{id}', 'Barang@getOneRecord'); 
//$app->post('/barang', 'Barang@create'); 
$app->post('/barang', 'Barang@storeBarang'); 
$app->put('/barang/{id}', 'Barang@update'); 
$app->delete('/barang/{id}', 'Barang@delete');
$app->get('/rekap', 'RekapTransaksi@getTransaksi'); 

$app->get('/stok', 'BarangStok@getAllRecord'); 
$app->get('/stok/{id}', 'BarangStok@getOneRecord'); 

$app->post('/pembelian', 'Pembelian@create'); 
$app->get('/pembelian', 'Pembelian@getAllRecord');
$app->get('/pembelian/{id}', 'Pembelian@getRecordDetail');

$app->post('/penjualan', 'Penjualan@create');
$app->get('/penjualan', 'Penjualan@getAllRecord');
$app->get('/penjualan/{id}', 'Penjualan@getRecordDetail');

$app->post("/register", "AuthController@register");
$app->post("/login", "AuthController@login");