<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_transaksi'); // Barang Masuk atau Barang Keluar
            $table->integer('barang_id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('supplier_id')->nullable();
            $table->integer('departemen_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_transaksis');
    }
}
