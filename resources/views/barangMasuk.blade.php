@extends('index')
@section('judul')
  Barang Masuk
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
      <li class="breadcrumb-item active" aria-current="page">Barang Masuk</li>
    </ol>
</nav>
<div class="card container">
    <div class="card-body">

        <form method="POST" action="/tambahbarangmasuk" class="form">
            @csrf

            <div class="form-floating mb-3" style="margin: 30px">
                <select name="nama_barang" class="form-select">
                    @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
                <label for="floatingInput">Nama Barang</label>
            </div>

            <div class="form-floating mb-3" style="margin: 30px">
                <select name="nama_supplier" class="form-select">
                    @foreach ($supplier as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                    @endforeach
                </select>
                <label for="floatingInput">Nama Supplier</label>
            </div>

            <div class="form-floating mb-3" style="margin: 30px">
                <input type="number" name="harga" placeholder="Harga" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Harga</label>
            </div>

            <div class="form-floating mb-3" style="margin: 30px">
                <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Jumlah</label>
            </div>

            <div class="card" style="margin-left: auto; margin-right: auto">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
