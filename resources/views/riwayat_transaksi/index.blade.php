@extends('index')

@section('judul')
    Riwayat Transaksi
@stop

@section('section')
<div class="container">
    <h1>Riwayat Transaksi</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Transaksi</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Supplier</th>
                <th>Departemen</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatTransaksis as $riwayat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $riwayat->tipe_transaksi }}</td>
                    <td>{{ $riwayat->barang->nama_barang ?? 'Tidak ada' }}</td> <!-- Pastikan relasi 'barang' di-load dengan 'with' dalam controller -->
                    <td>{{ $riwayat->jumlah }}</td>
                    <td>{{ $riwayat->harga }}</td>
                    <td>{{ $riwayat->supplier->nama_supplier ?? '-' }}</td>
                    <td>{{ $riwayat->departemen->nama_departemen ?? '-' }}</td>
                    <td>{{ $riwayat->created_at }}</td>
                    <td>
                        <form action="{{ route('riwayat-transaksi.destroy', $riwayat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
