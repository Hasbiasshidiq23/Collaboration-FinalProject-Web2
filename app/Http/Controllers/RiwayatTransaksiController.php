<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Departemen;
use Carbon\Carbon;
use Redirect;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $riwayatTransaksis = RiwayatTransaksi::with(['barang', 'supplier', 'departemen'])->get();
        return view('riwayat_transaksi.index', compact('riwayatTransaksis'));
    }

    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        $departemen = Departemen::all();
        return view('riwayat_transaksi.create', compact('barang', 'supplier', 'departemen'));
    }

    public function store(Request $request)
    {
        $now = Carbon::now();
        $riwayatTransaksi = new RiwayatTransaksi();
        $riwayatTransaksi->tipe_transaksi = $request->tipe_transaksi;
        $riwayatTransaksi->barang_id = $request->barang_id;
        $riwayatTransaksi->jumlah = $request->jumlah;
        $riwayatTransaksi->harga = $request->harga;
        $riwayatTransaksi->supplier_id = $request->supplier_id;
        $riwayatTransaksi->departemen_id = $request->departemen_id;
        $riwayatTransaksi->created_at = $now;
        $riwayatTransaksi->updated_at = $now;
        $riwayatTransaksi->save();

        return Redirect::to('riwayat-transaksi')->with('message', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $riwayatTransaksi = RiwayatTransaksi::find($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        $departemen = Departemen::all();
        return view('riwayat_transaksi.edit', compact('riwayatTransaksi', 'barang', 'supplier', 'departemen'));
    }

    public function update(Request $request, $id)
    {
        $riwayatTransaksi = RiwayatTransaksi::find($id);
        $riwayatTransaksi->tipe_transaksi = $request->tipe_transaksi;
        $riwayatTransaksi->barang_id = $request->barang_id;
        $riwayatTransaksi->jumlah = $request->jumlah;
        $riwayatTransaksi->harga = $request->harga;
        $riwayatTransaksi->supplier_id = $request->supplier_id;
        $riwayatTransaksi->departemen_id = $request->departemen_id;
        $riwayatTransaksi->save();

        return Redirect::to('riwayat-transaksi')->with('message', 'Transaksi berhasil diupdate');
    }

    public function destroy($id)
    {
        $riwayatTransaksi = RiwayatTransaksi::find($id);
        $riwayatTransaksi->delete();

        return Redirect::to('riwayat-transaksi')->with('message', 'Transaksi berhasil dihapus');
    }
}
