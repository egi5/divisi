<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function Data_master()
    {
        return view('menu/menu_data_master');
    }

    public function Pembelian()
    {
        return view('menu/menu_pembelian');
    }

    public function Produksi()
    {
        return view('menu/menu_produksi');
    }

    public function Penjualan()
    {
        return view('menu/menu_penjualan');
    }

    public function Gudang()
    {
        return view('menu/menu_gudang');
    }

    public function Inventaris()
    {
        return view('menu/menu_inventaris');
    }

    public function Akuntansi()
    {
        return view('menu/menu_akuntansi');
    }

    public function SDM()
    {
        return view('menu/menu_sdm');
    }

    public function Laporan()
    {
        return view('menu/menu_laporan');
    }

    
}
