<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'AuthController::login');

$routes->group('', ['filter' => 'isLoggedIn'], function ($routes) {

    // GetData
    $routes->get('/wilayah/kota_by_provinsi', 'GetWilayah::KotaByProvinsi');
    $routes->get('/wilayah/kecamatan_by_kota', 'GetWilayah::KecamatanByKota');
    $routes->get('/wilayah/kelurahan_by_kecamatan', 'GetWilayah::KelurahanByKecamatan');

    // Menu
    $routes->get('/dashboard', 'Dashboard::index', ['filter' => 'permission:Dashboard']);
    $routes->get('master', 'Menu::Data_master', ['filter' => 'permission:Data Master']);
    $routes->get('pembelian', 'Menu::Pembelian', ['filter' => 'permission:Pembelian']);
    $routes->get('penjualan', 'Menu::Penjualan', ['filter' => 'permission:Penjualan']);
    $routes->get('produksi', 'Menu::Produksi', ['filter' => 'permission:Produksi']);
    $routes->get('menu_gudang', 'Menu::Gudang', ['filter' => 'permission:Gudang']);
    $routes->get('inventaris', 'Menu::Inventaris', ['filter' => 'permission:Inventaris']);
    $routes->get('akuntansi', 'Menu::Akuntansi', ['filter' => 'permission:Akuntansi']);
    $routes->get('sdm', 'Menu::SDM', ['filter' => 'permission:SDM']);
    $routes->get('laporan', 'Menu::Laporan', ['filter' => 'permission:Laporan']);

    // ------------------------------------------------------------------------------------ DATA MASTER

    // Supplier
    $routes->get('supplier', 'Supplier::index', ['filter' => 'permission:Data Master']);
    $routes->get('supplier/(:num)', 'Supplier::show/$1', ['filter' => 'permission:Data Master']);
    $routes->post('supplier', 'Supplier::create', ['filter' => 'permission:Data Master,Admin Supplier']);
    $routes->get('supplier/new', 'Supplier::new', ['filter' => 'permission:Data Master,Admin Supplier']);
    $routes->get('supplier/(:num)/edit', 'Supplier::edit/$1', ['filter' => 'permission:Data Master,Admin Supplier']);
    $routes->put('supplier/(:num)', 'Supplier::update/$1  ', ['filter' => 'permission:Data Master,Admin Supplier']);
    // $routes->delete('supplier/(:num) ', 'Supplier::delete/$1', ['filter' => 'permission:Data Master,Admin Supplier']);
    $routes->resource('supplier', ['filter' => 'permission:Data Master']);
    $routes->resource('supplierpj', ['filter' => 'permission:Data Master']);
    $routes->resource('supplieralamat', ['filter' => 'permission:Data Master']);
    $routes->resource('supplierlink', ['filter' => 'permission:Data Master']);
    $routes->resource('suppliercs', ['filter' => 'permission:Data Master']);

    // Produk
    $routes->resource('produk', ['filter' => 'permission:Data Master']);
    $routes->get('getdataproduk', 'Produk::getDataProduk', ['filter' => 'permission:Data Master']);
    $routes->post('produkplan', 'ProdukPlan::create', ['filter' => 'permission:Data Master']);

    // Customer
    $routes->get('customer', 'Customer::index', ['filter' => 'permission:Data Master']);
    $routes->get('customer/(:num)', 'Customer::show/$1', ['filter' => 'permission:Data Master']);
    $routes->post('customer', 'Customer::create', ['filter' => 'permission:Data Master,Admin Customer']);
    $routes->get('customer/new', 'Customer::new', ['filter' => 'permission:Data Master,Admin Customer']);
    $routes->get('customer/(:num)/edit', 'Customer::edit/$1', ['filter' => 'permission:Data Master,Admin Customer']);
    $routes->put('customer/(:num)', 'Customer::update/$1  ', ['filter' => 'permission:Data Master,Admin Customer']);
    // $routes->delete('customer/(:num) ', 'Customer::delete/$1', ['filter' => 'permission:Data Master,Admin Customer']);
    $routes->resource('customer', ['filter' => 'permission:Data Master']);
    $routes->resource('customerpj', ['filter' => 'permission:Data Master']);
    $routes->resource('customeralamat', ['filter' => 'permission:Data Master']);
    $routes->resource('customerrekening', ['filter' => 'permission:Data Master']);

    // Gudang
    $routes->get('gudang', 'Gudang::index', ['filter' => 'permission:Data Master']);
    $routes->get('gudang/(:num)', 'Gudang::show/$1', ['filter' => 'permission:Data Master']);
    $routes->post('gudang', 'Gudang::create', ['filter' => 'permission:Data Master,Penanggung Jawab Gudang']);
    $routes->get('gudang/new', 'Gudang::new', ['filter' => 'permission:Data Master,Penanggung Jawab Gudang']);
    $routes->get('gudang/(:num)/edit', 'Gudang::edit/$1', ['filter' => 'permission:Data Master,Penanggung Jawab Gudang']);
    $routes->put('gudang/(:num)', 'Gudang::update/$1  ', ['filter' => 'permission:Data Master,Penanggung Jawab Gudang']);
    // $routes->delete('gudang/(:num) ', 'Gudang::delete/$1', ['filter' => 'permission:Data Master,Penanggung Jawab Gudang']);
    $routes->resource('gudang', ['filter' => 'permission:Data Master']);
    $routes->resource('gudangpj', ['filter' => 'permission:Data Master']);

    $routes->resource('ekspedisi', ['filter' => 'permission:Data Master']);
    $routes->resource('jasa', ['filter' => 'permission:Data Master']);

    //Devisi
    $routes->get('divisi', 'Divisi::index', ['filter' => 'permission:Data Master']);
    $routes->get('divisi/(:num)', 'Divisi::show/$1', ['filter' => 'permission:Data Master']);
    $routes->get('divisi/(:num)', 'Divisi::edit/$1', ['filter' => 'permission:Data Master']);
    $routes->get('divisi/new', 'Divisi::new', ['filter' => 'permission:Data Master']);

    


    // ------------------------------------------------------------------------------------ TRANSAKSI

    // Pemesanan
    $routes->resource('pemesanan', ['filter' => 'permission:Pembelian']);
    $routes->get('getdatapemesanan', 'Pemesanan::getDataPemesanan', ['filter' => 'permission:Pembelian']);
    $routes->get('list_pemesanan/(:any)', 'Pemesanan_detail::List_pemesanan/$1', ['filter' => 'permission:Pembelian']);
    $routes->post('simpan_pemesanan', 'Pemesanan_detail::simpan_pemesanan', ['filter' => 'permission:Pembelian']);
    $routes->post('produks_pemesanan', 'Pemesanan_detail::getListProdukPemesanan', ['filter' => 'permission:Pembelian']);
    $routes->post('check_list_produk', 'Pemesanan_detail::check_list_produk', ['filter' => 'permission:Pembelian']);
    $routes->post('create_list_produk', 'Pemesanan_detail::create', ['filter' => 'permission:Pembelian']);
    $routes->resource('pemesanan_detail', ['filter' => 'permission:Pembelian']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
