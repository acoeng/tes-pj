<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Barang extends Controller
{
    /**
     * Date : 07-03-2020
     * Description : Memperoleh semua data barang
     * Developer : Ari
     * Status : Create
     */
    public function getAllRecord()
    {
        $data = DB::table('barang')->get();
        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    /**
     * Date : 07-03-2020
     * Description : Memperoleh data barang berdasarkan 'id'
     * Developer : Ari
     * Status : Create
     */
    public function getOneRecord($id)
    {
        $data = DB::table('barang')->where('id', $id)->get();
        $result = ['code' => '99', 'data' => $data];
        return response()->json($result);
    }

    /**
     * Date : 07-03-2020
     * Description : Simpan data barang baru
     * Developer : Ari
     * Status : Create
     */
    public function create(Request $request)
    {
        $data = [
                'kode_barang' => $request->input('kode'), 
                'nama_barang' => $request->input('nama'), 
                'harga_jual' => $request->input('harga')
             ];
        $insert = DB::table('barang')->insert($data);

        return response()->json($insert, 201);
    }

    /**
     * Date : 07-03-2020
     * Description : Update data barang
     * Developer : Ari
     * Status : Create
     */
    public function update($id, Request $request)
    {
        $data = [
                'nama_barang' => $request->input('nama'), 
                'harga_jual' => $request->input('harga')
            ];
        $affected = DB::table('barang')->where('id', $id)->update($data);

        return response()->json($affected, 200);
    }

    /**
     * Date : 07-03-2020
     * Description : Menghapus data barang
     * Developer : Ari
     * Status : Create
     */
    public function delete($id)
    {
        DB::table('barang')->where('id', '=', $id)->delete();
        $message = ['code' => '99', 'message' => 'Data barang berhasil dihapus'];
        return response()->json($message, 200);
    }
}