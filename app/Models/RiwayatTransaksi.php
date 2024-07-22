<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    use HasFactory;

    protected $table = 'riwayat_transaksis'; // Sesuaikan dengan nama tabel yang ada di database

    protected $fillable = [
        'tipe_transaksi',
        'barang_id',
        'jumlah',
        'harga',
        'supplier_id',
        'departemen_id',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
