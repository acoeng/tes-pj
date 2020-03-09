<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Penjualan extends Controller
{
    /**
     * Date : 09-03-2020
     * Description : Penggunaan token
     * Developer : Ari
     * Status : Create
     */
    public function __construct()
    {
        $this->middleware("login");
    }
    
    /**
     * Date : 07-03-2020
     * Description : Get semua transaksi penjualan
     * Developer : Ari
     * Status : Create
     */
    public function getAllRecord()
    {
        $data = DB::table('penjualan')->get();
        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    /**
     * Date : 07-03-2020
     * Description : Get transaksi penjualan berdasarkan id
     * Developer : Ari
     * Status : Create
     */
    public function getRecordDetail($id)
    {
        $data = DB::table('penjualan_dt')
                    ->join('barang', 'penjualan_dt.id_barang', '=', 'barang.id')
                    ->select('barang.kode_barang', 'barang.nama_barang', 'barang.harga_jual', 'penjualan_dt.jumlah')
                    ->where('penjualan_dt.id_penjualan', $id)
                    ->get();

        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    /**
     * Date : 07-03-2020
     * Description : Simpan transaksi penjualan
     * Developer : Ari
     * Status : Create
     */
    public function create(Request $request)
    {
        $id_barang = $request->input('id_barang');
        $jumlah = $request->input('jumlah');

        $data = ['rp_bayar' => $request->input('rp_bayar')];
        $id = DB::table('penjualan')->insertGetId($data);

        for($i=0; $i<count($id_barang); $i++) {
            $item_barang[] = [
                'id_penjualan' => $id,
                'id_barang' => $id_barang[$i],
                'jumlah' => $jumlah[$i]
            ];
        }

        $affected = DB::table('penjualan_dt')->insert($item_barang);

        return response()->json($affected, 201);
    }
}
