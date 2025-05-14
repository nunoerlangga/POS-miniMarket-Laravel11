@extends('templates/header')

@section('content')
<section class="content-header">
    <h1>Pelanggan Page</h1>
</section>

<section class="content">
    @include('templates/feedback')
    <div class="box">
        <div class="box-header with-border">
            <a href="{{ url('pelanggan/add') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Tambah
            </a>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($pelanggan as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->nama_pelanggan }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>
                                <a href="{{ url("pelanggan/$row->id_pelanggan/edit") }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url("pelanggan/$row->id_pelanggan/delete") }}" method="post" style="display: inline;" onclick="return confirm('Yakin ingin menghapus data Pelanggan ini?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($pelanggan->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data pelanggan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
