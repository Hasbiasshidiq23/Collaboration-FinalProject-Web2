<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use View;

class DepartemenController extends Controller
{
    // ================ LIHAT DATA ===============
    public function lihatDataDepartemen()
    {
        $data = DB::table('departemen')->get();
        return View::make('/departemen')->with('departemen', $data);
    }

    // =========== TAMBAH DATA ============
    public function tambahdepartemen()
    {
        $data = [
            'nama_departemen' => request()->get('nama_departemen'),
            'deskripsi' => request()->get('deskripsi')
        ];
        DB::table('departemen')->insert($data);
        return Redirect::to('departemen')->with('message', 'Berhasil Menambah Data');
    }

    // =========== HAPUS DATA ============
    public function hapusDepartemen($id)
    {
        DB::table('departemen')->where('id', '=', $id)->delete();
        return Redirect::to('departemen')->with('message', 'Berhasil Menghapus Data');
    }

    // =========== UBAH DATA ============
    public function updatedepartemen($id)
    {
        $data = DB::table('departemen')->where('id', '=', $id)->first();
        return View::make('ubahDepartemen')->with('departemen', $data);
    }

    public function ubahdepartemen()
    {
        $data = [
            'nama_departemen' => request()->get('nama_departemen'),
            'deskripsi' => request()->get('deskripsi')
        ];

        DB::table('departemen')->where('id', '=', request()->get('id'))->update($data);
        return Redirect::to('/departemen')->with('message', 'Data Berhasil Diupdate');
    }
}
