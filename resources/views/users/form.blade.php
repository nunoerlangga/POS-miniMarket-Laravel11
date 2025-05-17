@extends('templates/header')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ empty($user) ? 'Tambah' : 'Edit' }} Data User
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data User</li>
        <li class="active">{{ empty($user) ? 'Tambah' : 'Edit' }} Data User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('templates/feedback')

    <div class="box">
        <div class="box-header with-border">
            <a href="{{ url('users') }}" class="btn bg-purple"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-body">
            <form action="{{ empty($user) ? url('users/add') : url("users/$user->id_user/edit") }}" class="form-horizontal" method="POST">
                @csrf
                @if (!empty($user))
                    @method('patch')
                @endif

                <!-- Nama users -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama user</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama User" value="{{ old('nama_user', @$user->nama_user) }}" required>
                    </div>
                </div>
                <!-- Username -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="{{ old('username', @$user->username) }}" required>
                    </div>
                </div>
                <!-- Role -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Role</label>
                    <div class="col-sm-10">
                        <select name="role" class="form-control" required>
                            @foreach ($roleOptions as $option)
                                <option value="{{ $option }}" {{(isset($user) && $user->role == $option ? 'selected' :'')}}>
                                    {{ ucfirst($option)}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- password -->
                <div class="form-group">
                    <label class="control-label col-sm-2">password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" value="{{ old('password', @$user->password) }}" required>
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
