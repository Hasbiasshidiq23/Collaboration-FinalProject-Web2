@extends('index')
@section('judul')
  Daftar Departemen
@stop

@section('section')
  @if (Session::has('message'))
    <script>
        alert("{!!Session::get('message')!!}");
      </script>
    @endif
    <div class="">
      <a href="tambahDepartemen" class="btn btn-primary"style="margin: 20px">Tambah Departemen</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th>No</th>
              <th>Nama Departemen</th>
              <th>Deskripsi</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
            @foreach ($departemen as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nama_departemen}}</td>
              <td>{{$item->deskripsi}}</td>
              <td><a class="btn btn-danger" href="hapusDepartemen/{{$item->id}}">Hapus</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="formeditDepartemen/{{$item->id}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
      </div>
    </div>
@stop
