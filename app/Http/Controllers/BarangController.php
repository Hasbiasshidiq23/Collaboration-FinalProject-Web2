<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use View;

class BarangController extends Controller
{
    // ================ LIHAT DATA ===============
    public function lihatDataBarang(Request $request)
    {
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');

        $data = DB::table('barang')->orderBy($sortBy, $sortOrder)->get();
        $barang_masuk = DB::table('barang')
            ->join('detail_barang_masuk', 'barang.id', '=', 'detail_barang_masuk.barang_id')
            ->join('barang_masuk', 'barang_masuk.id', '=', 'detail_barang_masuk.barang_masuk_id')
            ->get();

        $barang_keluar = DB::table('barang')
            ->join('detail_barang_keluar', 'barang.id', '=', 'detail_barang_keluar.barang_id')
            ->join('barang_keluar', 'barang_keluar.id', '=', 'detail_barang_keluar.barang_keluar_id')
            ->get();

        return View::make('/dataBarang')->with([
            'barang' => $data, 
            'barangmasuk' => $barang_masuk, 
            'barangkeluar' => $barang_keluar,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);
    }

    // =========== TAMBAH DATA ============
    public function tambahbarang()
    {
        $data = [
            'nama_barang' => request()->get('nama_barang'),
            'harga_satuan' => request()->get('harga_satuan'),
            'stok' => '0',
            'satuan' => request()->get('satuan')
        ];
        DB::table('barang')->insert($data);
        return Redirect::to('dataBarang')->with('message', 'Berhasil Menambah Data');
    }

    // =========== HAPUS DATA ============
    public function hapusBarang($id)
    {
        DB::table('barang')->where('id', '=', $id)->delete();
        return Redirect::to('dataBarang')->with('message', 'Berhasil Menghapus Data');
    }

    // =========== UBAH DATA ============
    public function updatebarang($id)
    {
        $data = DB::table('barang')->where('id', '=', $id)->first();
        return View::make('ubahBarang')->with('barang', $data);
    }

    public function ubahbarang()
    {
        $data = [
            'nama_barang' => request()->get('nama_barang'),
            'harga_satuan' => request()->get('harga_satuan'),
            'stok' => '0',
            'satuan' => request()->get('satuan')
        ];

        DB::table('barang')->where('id', '=', request()->get('id'))->update($data);
        return Redirect::to('/dataBarang')->with('message', 'Data Berhasil Diupdate');
    }
}
