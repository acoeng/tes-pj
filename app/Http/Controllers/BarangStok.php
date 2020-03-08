<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarangStok extends Controller
{
    /**
     * Date : 07-03-2020
     * Description : Create barang stok
     * Developer : Ari
     * Status : Create
     */
    public function __construct()
    {
        //
    }

    public function getAllRecord()
    {
        $data = DB::table('barang_stok')
                    ->join('barang', 'barang_stok.id_barang', '=', 'barang.id')
                    ->select('barang_stok.id', 'barang.kode_barang', 'barang.nama_barang', 'barang_stok.total_barang', 'barang_stok.jenis_stok')
                    ->get();

        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    public function getOneRecord($id)
    {
        $data = DB::table('barang_stok')
                    ->join('barang', 'barang_stok.id_barang', '=', 'barang.id')
                    ->select('barang.kode_barang', 'barang.nama_barang', 'barang_stok.total_barang', 'barang_stok.jenis_stok')
                    ->where('barang_stok.id', $id)
                    ->get();
        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    
}
