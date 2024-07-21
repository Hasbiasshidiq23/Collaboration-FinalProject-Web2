@extends('index')

@section('judul')
  Tambah Barang
@stop

@section('section')
@if (Session::has('message'))
    <script>
        alert("{!! Session::get('message') !!}");
    </script>
@endif
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dataBarang">Data Barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
    </ol>
</nav>
<div class="card">
    <div class="card-body text-center">
        <form method="POST" action="/tambahbarang" class="form">
            @csrf
            <div class="form-floating mb-3" style="margin: 30px">
                <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Nama Barang</label>
            </div>
            <div class="form-floating mb-3" style="margin: 30px">
                <input type="number" name="harga_satuan" placeholder="Harga Satuan" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Harga Satuan</label>
            </div>
            <div class="form-floating mb-3" style="margin: 30px">
                <input type="text" name="satuan" placeholder="Satuan" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Satuan</label>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@stop
