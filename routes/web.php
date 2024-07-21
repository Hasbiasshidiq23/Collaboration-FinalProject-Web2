<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RiwayatTransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// TAMBAH DATA ===========================

Route::get('/tambahBarang', function () {
    return view('tambahBarang');
});

Route::get('/tambahDepartemen', function () {
    return view('tambahDepartemen');
});

Route::get('/tambahSupplier', function () {
    return view('tambahSupplier');
});

Route::post('tambahbarang', [BarangController::class, 'tambahbarang']);

Route::post('tambahdepartemen', [DepartemenController::class, 'tambahdepartemen']);

Route::post('tambahsupplier', [SupplierController::class, 'tambahsupplier']);

// LIHAT DATA =========================

Route::get('dataBarang', [BarangController::class, 'lihatDataBarang'])->name('dataBarang');

Route::get('departemen', [DepartemenController::class, 'lihatDataDepartemen'])->name('departemen');

Route::get('supplier', [SupplierController::class, 'lihatDataSupplier'])->name('supplier');

Route::resource('riwayat-transaksi', RiwayatTransaksiController::class);

// HAPUS DATA ======================

Route::get('hapusBarang/{id}', [BarangController::class, 'hapusBarang']);

Route::get('hapusSupplier/{id}', [SupplierController::class, 'hapusSupplier']);

Route::get('hapusDepartemen/{id}', [DepartemenController::class, 'hapusDepartemen']);

// UBAH DATA ========================

Route::get('formeditBarang/{id}', [BarangController::class, 'updatebarang']);

Route::post('ubahbarang', [BarangController::class, 'ubahbarang']);

Route::get('formeditSupplier/{id}', [SupplierController::class, 'updatesupplier']);

Route::post('ubahsupplier', [SupplierController::class, 'ubahsupplier']);

Route::get('formeditDepartemen/{id}', [DepartemenController::class, 'updatedepartemen']);

Route::post('ubahdepartemen', [DepartemenController::class, 'ubahdepartemen']);



// BARANG MASUK ===========================

Route::get('barangMasuk', [TransaksiController::class, 'barangMasuk']);

Route::post('tambahbarangmasuk', [TransaksiController::class, 'tambahbarangmasuk']);

// BARANG KELUAR ============================

Route::get('barangKeluar', [TransaksiController::class, 'barangKeluar']);

Route::post('tambahbarangkeluar', [TransaksiController::class, 'tambahbarangkeluar']);

require __DIR__.'/auth.php';
