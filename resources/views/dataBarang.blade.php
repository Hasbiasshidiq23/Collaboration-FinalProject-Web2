@extends('index')
@section('judul')
    Data Barang
@stop

@section('section')
    @if (Session::has('message'))
        <script>
            alert("{!! Session::get('message') !!}");
        </script>
    @endif
    <div class="">
        <a href="tambahBarang" class="btn btn-primary" style="margin: 20px">Tambah Barang</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th>
                            <a href="?sort_by=id&sort_order={{ $sortOrder === 'asc' ? 'desc' : 'asc' }}">No
                                @if ($sortBy === 'id')
                                    {{ $sortOrder === 'asc' ? '↑' : '↓' }}
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="?sort_by=nama_barang&sort_order={{ $sortOrder === 'asc' ? 'desc' : 'asc' }}">Nama Barang
                                @if ($sortBy === 'nama_barang')
                                    {{ $sortOrder === 'asc' ? '↑' : '↓' }}
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="?sort_by=harga_satuan&sort_order={{ $sortOrder === 'asc' ? 'desc' : 'asc' }}">Harga Satuan
                                @if ($sortBy === 'harga_satuan')
                                    {{ $sortOrder === 'asc' ? '↑' : '↓' }}
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="?sort_by=stok&sort_order={{ $sortOrder === 'asc' ? 'desc' : 'asc' }}">Stok
                                @if ($sortBy === 'stok')
                                    {{ $sortOrder === 'asc' ? '↑' : '↓' }}
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="?sort_by=satuan&sort_order={{ $sortOrder === 'asc' ? 'desc' : 'asc' }}">Satuan
                                @if ($sortBy === 'satuan')
                                    {{ $sortOrder === 'asc' ? '↑' : '↓' }}
                                @endif
                            </a>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($barang as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->harga_satuan }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>
                                <a class="btn btn-danger" href="hapusBarang/{{ $item->id }}">Hapus</a>
                                &nbsp;&nbsp;
                                <a class="btn btn-secondary" href="formeditBarang/{{ $item->id }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row" style="margin-top: 50px">
        <div class="col card">
            <a href="barangMasuk" class="btn btn-primary" style="margin: 20px;float: right; ">Pembelian</a>
            <div class="table-responsive" style="margin-top: 100px">
                <h3 style="margin-bottom: 20px">Riwayat Barang Masuk</h3>
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Supplier ID</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($barangmasuk as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->supplier_id }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col card">
            <a href="barangKeluar" class="btn btn-primary" style="margin: 20px;float: left; ">Penjualan</a>
            <div class="table-responsive" style="margin-top: 100px">
                <h3 style="margin-bottom: 20px">Riwayat Barang Keluar</h3>
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Departemen ID</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($barangkeluar as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->departemen_id }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
