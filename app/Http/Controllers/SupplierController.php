<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use View;

class SupplierController extends Controller
{
    // ================ LIHAT DATA ===============
    public function lihatDataSupplier()
    {
        $data = DB::table('supplier')->get();
        return View::make('/supplier')->with('supplier', $data);
    }

    // =========== TAMBAH DATA ============
    public function tambahsupplier()
    {
        $data = [
            'nama_supplier' => request()->get('nama_supplier'),
            'deskripsi' => request()->get('deskripsi')
        ];
        DB::table('supplier')->insert($data);
        return Redirect::to('supplier')->with('message', 'Berhasil Menambah Data');
    }

    // =========== HAPUS DATA ============
    public function hapusSupplier($id)
    {
        DB::table('supplier')->where('id', '=', $id)->delete();
        return Redirect::to('supplier')->with('message', 'Berhasil Menghapus Data');
    }

    // =========== UBAH DATA ============
    public function updatesupplier($id)
    {
        $data = DB::table('supplier')->where('id', '=', $id)->first();
        return View::make('ubahSupplier')->with('supplier', $data);
    }

    public function ubahsupplier()
    {
        $data = [
            'nama_supplier' => request()->get('nama_supplier'),
            'deskripsi' => request()->get('deskripsi')
        ];

        DB::table('supplier')->where('id', '=', request()->get('id'))->update($data);
        return Redirect::to('/supplier')->with('message', 'Data Berhasil Diupdate');
    }
}