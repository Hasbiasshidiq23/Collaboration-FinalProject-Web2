@extends('index')
@section('judul')
  Ubah Supplier
@stop

@section('section')
@if (Session::has('message'))
    <script>
        alert("{!! Session::get('message') !!}");
    </script>
@endif
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../supplier">Supplier</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Supplier</li>
    </ol>
</nav>
<div class="card">
    <div class="card-body text-center">

        <form method="POST" action="/ubahsupplier" class="form">
            @csrf
            <input type="hidden" name="id" value="{{ $supplier->id }}" class="form-control">

            <div class="form-floating mb-3" style="margin: 30px">
                <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Nama Supplier</label>
            </div>

            <div class="form-floating mb-3" style="margin: 30px">
                <input type="text" name="deskripsi" value="{{ $supplier->deskripsi }}" placeholder="Deskripsi" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Deskripsi</label>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>

@stop
