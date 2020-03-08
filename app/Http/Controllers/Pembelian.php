<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Pembelian extends Controller
{
    /**
     * Date : 07-03-2020
     * Description : Create transaksi pembelian
     * Developer : Ari
     * Status : Create
     */
    public function __construct()
    {
        //
    }

    public function getAllRecord()
    {
        $data = DB::table('pembelian')->get();
        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    public function getRecordDetail($id)
    {
        $data = DB::table('pembelian_dt')
                    ->join('barang', 'pembelian_dt.id_barang', '=', 'barang.id')
                    ->select('barang.kode_barang', 'barang.nama_barang', 'pembelian_dt.jumlah', 'pembelian_dt.harga')
                    ->where('pembelian_dt.id_pembelian', $id)
                    ->get();

        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    public function create(Request $request)
    {
        $id_barang = $request->input('id_barang');
        $jumlah = $request->input('jumlah');
        $harga = $request->input('harga');

        $data = [
            'nonota' => $request->input('nonota'), 
            'tanggal_nota' => date('Y-m-d', strtotime($request->input('tanggal')))
        ];
        $id = DB::table('pembelian')->insertGetId($data);

        for($i=0; $i<count($id_barang); $i++) {
            $item_barang[] = [
                'id_pembelian' => $id, 
                'id_barang' => $id_barang[$i], 
                'jumlah' => $jumlah[$i], 
                'harga' => $harga[$i]
            ];
        }

        $affected = DB::table('pembelian_dt')->insert($item_barang);

        return response()->json($affected, 201);
    }
}
