@extends('index')
@section('judul')
  Tambah Transaksi
@stop

@section('section')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('riwayat-transaksi.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <select name="tipe_transaksi" class="form-control" required>
                <option value="masuk">Barang Masuk</option>
                <option value="keluar">Barang Keluar</option>
            </select>
            <label for="tipe_transaksi">Tipe Transaksi</label>
        </div>
        <div class="form-floating mb-3">
            <select name="barang_id" class="form-control" required>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                @endforeach
            </select>
            <label for="barang_id">Barang</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="jumlah" class="form-control" required>
            <label for="jumlah">Jumlah</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="harga" class="form-control" required>
            <label for="harga">Harga</label>
        </div>
        <div class="form-floating mb-3">
            <select name="supplier_id" class="form-control">
                <option value="">-</option>
                @foreach ($supplier as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                @endforeach
            </select>
            <label for="supplier_id">Supplier</label>
        </div>
        <div class="form-floating mb-3">
            <select name="departemen_id" class="form-control">
                <option value="">-</option>
                @foreach ($departemen as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                @endforeach
            </select>
            <label for="departemen_id">Departemen</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@stop
