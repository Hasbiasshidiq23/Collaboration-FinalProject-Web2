<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Redirect;
use View;
use App\Models\RiwayatTransaksi;

class TransaksiController extends Controller
{
    // ================ BARANG MASUK ===============
    public function barangMasuk()
    {
        $barang = DB::table('barang')->get();
        $supplier = DB::table('supplier')->get();

        return View::make('barangMasuk')->with(['barang' => $barang, 'supplier' => $supplier]);
    }

    public function tambahbarangmasuk()
    {
        $now = Carbon::now();
        $barangmasuk = [
            'harga' => request()->get('harga'),
            'jumlah' => request()->get('jumlah'),
            'supplier_id' => request()->get('nama_supplier'),
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('barang_masuk')->insert($barangmasuk);
        $id_barang_masuk = DB::table('barang_masuk')->max('id');

        $detailBarangMasuk = [
            'barang_masuk_id' => $id_barang_masuk,
            'barang_id' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah')
        ];
        DB::table('detail_barang_masuk')->insert($detailBarangMasuk);

        $stoktambah = request()->get('jumlah');
        $stoksekarang = DB::table('barang')
            ->select(DB::raw('stok'))
            ->where('id', '=', request()->get('nama_barang'))->get();

        $nilai = 0;
        foreach ($stoksekarang as $barang) {
            $nilai = $barang->stok;
        }

        $data = ['stok' => $nilai + $stoktambah];
        DB::table('barang')->where('id', '=', request()->get('nama_barang'))->update($data);

        // Save to RiwayatTransaksi
        RiwayatTransaksi::create([
            'tipe_transaksi' => 'masuk',
            'barang_id' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah'),
            'harga' => request()->get('harga'),
            'supplier_id' => request()->get('nama_supplier'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return Redirect::to('/dataBarang')->with('message', 'Transaksi Barang Masuk Berhasil');
    }

    // ================ BARANG KELUAR ===============
    public function barangKeluar()
    {
        $barang = DB::table('barang')->get();
        $departemen = DB::table('departemen')->get();

        return View::make('barangKeluar')->with(['barang' => $barang, 'departemen' => $departemen]);
    }

    public function tambahbarangkeluar()
    {
        $now = Carbon::now();
        $barangkeluar = [
            'harga' => request()->get('harga'),
            'jumlah' => request()->get('jumlah'),
            'departemen_id' => request()->get('nama_departemen'),
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('barang_keluar')->insert($barangkeluar);
        $id_barang_keluar = DB::table('barang_keluar')->max('id');

        $detailBarangKeluar = [
            'barang_keluar_id' => $id_barang_keluar,
            'barang_id' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah')
        ];
        DB::table('detail_barang_keluar')->insert($detailBarangKeluar);

        $stockkurang = request()->get('jumlah');
        $stocksekarang = DB::table('barang')
            ->select(DB::raw('stok'))
            ->where('id', '=', request()->get('nama_barang'))->get();

        $nilai = 0;
        foreach ($stocksekarang as $barang) {
            $nilai = $barang->stok;
        }

        $data = ['stok' => $nilai - $stockkurang];
        DB::table('barang')->where('id', '=', request()->get('nama_barang'))->update($data);

        // Save to RiwayatTransaksi
        RiwayatTransaksi::create([
            'tipe_transaksi' => 'keluar',
            'barang_id' => request()->get('nama_barang'),
            'jumlah' => request()->get('jumlah'),
            'harga' => request()->get('harga'),
            'departemen_id' => request()->get('nama_departemen'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return Redirect::to('/dataBarang')->with('message', 'Transaksi Barang Keluar Berhasil');
    }
}
