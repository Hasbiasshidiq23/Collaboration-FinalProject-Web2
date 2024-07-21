<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_barang_masuk', function (Blueprint $table) {
            $table->id()->unsigned()->change();
            $table->foreignId('barang_masuk_id')->references('id')->on('barang_masuk')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->id()->unsigned()->change();
            $table->foreignId('barang_id')->references('id')->on('barang')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('detail_barang_keluar', function (Blueprint $table) {
            $table->id()->unsigned()->change();
            $table->foreignId('barang_keluar_id')->references('id')->on('barang_keluar')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->id()->unsigned()->change();
            $table->foreignId('barang_id')->references('id')->on('barang')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->id()->unsigned()->change();
            $table->foreignId('supplier_id')->references('id')->on('supplier')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->id()->unsigned()->change();
            $table->foreignId('departemen_id')->references('id')->on('departemen')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
