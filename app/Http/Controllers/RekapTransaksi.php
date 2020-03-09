<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RekapTransaksi extends Controller
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
     * Date : 09-03-2020
     * Description : Memperoleh rekap transaksi penjualan
     * Developer : Ari
     * Status : Create
     */
    public function getTransaksi()
    {
        $data = DB::table('view_rekap_transaksi')->get();
        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }
}
