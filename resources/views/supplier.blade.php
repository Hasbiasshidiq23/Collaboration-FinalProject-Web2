@extends('index')
@section('judul')
  Daftar Supplier
@stop

@section('section')
  @if (Session::has('message'))
    <script>
        alert("{!!Session::get('message')!!}");
      </script>
    @endif
    <div class="">
      <a href="tambahSupplier" class="btn btn-primary"style="margin: 20px">Tambah Supplier</a>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr class="table-dark">
              <th>No</th>
              <th>Nama Supplier</th>
              <th>Deskripsi</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            @foreach ($supplier as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nama_supplier}}</td>
              <td>{{$item->deskripsi}}</td>
              <td><a class="btn btn-danger" href="hapusSupplier/{{$item->id}}">Hapus</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="formeditSupplier/{{$item->id}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
@stop
