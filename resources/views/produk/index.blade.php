@extends('templates/header')

@section('content')
<section class="content-header">
    <h1>Produk Page</h1>
</section>

<section class="content">
    @include('templates/feedback')
    <div class="box">
        <div class="box-header with-border">
            <a href="{{ url('produk/add') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Tambah
            </a>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($produk as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>Rp {{ number_format($row->harga_beli_produk, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($row->harga_jual_produk, 0, ',', '.') }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            <td>{{ $row->stok_produk }}</td>
                            <td>{{ $row->satuan }}</td>
                            <td>
                                <a href="{{ url("produk/$row->id_produk/edit") }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url("produk/$row->id_produk/delete") }}" method="post" style="display: inline;" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($produk->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data produk.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
