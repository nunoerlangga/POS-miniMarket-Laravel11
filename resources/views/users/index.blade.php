@extends('templates/header')

@section('content')
<section class="content-header">
    <h1>Users Page</h1>
</section>

<section class="content">
    @include('templates/feedback')
    <div class="box">
        <div class="box-header with-border">
            <a href="{{ url('users/add') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Tambah
            </a>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($user as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->nama_user }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->password }}</td>
                            <td>{{ $row->role }}</td>
                            <td>
                                <a href="{{ url("users/$row->id_user/edit") }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url("users/$row->id_user/delete") }}" method="post" style="display: inline;" onclick="return confirm('Yakin ingin menghapus data Users ini?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($user->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data users.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
