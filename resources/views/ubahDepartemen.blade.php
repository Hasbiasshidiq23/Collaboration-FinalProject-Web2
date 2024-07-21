@extends('index')
@section('judul')
  Ubah Departemen
@stop

@section('section')
@if (Session::has('message'))
    <script>
        alert("{!! Session::get('message') !!}");
    </script>
@endif
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../departemen">Departemen</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Departemen</li>
    </ol>
</nav>
<div class="card">
    <div class="card-body text-center">

        <form method="POST" action="/ubahdepartemen" class="form">
            @csrf
            <input type="hidden" name="id" value="{{ $departemen->id }}" class="form-control">

            <div class="form-floating mb-3" style="margin: 30px">
                <input type="text" name="nama_departemen" value="{{ $departemen->nama_departemen }}" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Nama Departemen</label>
            </div>

            <div class="form-floating mb-3" style="margin: 30px">
                <input type="text" name="deskripsi" value="{{ $departemen->deskripsi }}" placeholder="Deskripsi" class="form-control" id="floatingInput" required autofocus autocomplete="off">
                <label for="floatingInput">Deskripsi</label>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>

@stop
