@extends('templates/header')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ empty($pelanggan) ? 'Tambah' : 'Edit' }} Data Pelanggan
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data Pelanggan</li>
        <li class="active">{{ empty($pelanggan) ? 'Tambah' : 'Edit' }} Data pelanggan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('templates/feedback')

    <div class="box">
        <div class="box-header with-border">
            <a href="{{ url('pelanggan') }}" class="btn bg-purple"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-body">
            <form action="{{ empty($pelanggan) ? url('pelanggan/add') : url("pelanggan/$pelanggan->id_pelanggan/edit") }}" class="form-horizontal" method="POST">
                @csrf
                @if (!empty($pelanggan))
                    @method('patch')
                @endif

                <!-- Nama Pelanggan -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan" value="{{ old('nama_pelanggan', @$pelanggan->nama_pelanggan) }}" required>
                    </div>
                </div>
                <!-- No Hp Pelanggan -->
                <div class="form-group">
                    <label class="control-label col-sm-2">No Hp</label>
                    <div class="col-sm-10">
                        <input type="number" name="no_hp" class="form-control" placeholder="Masukkan No Hp" value="{{ old('no_hp', @$pelanggan->no_hp) }}" required>
                    </div>
                </div>
                <!-- Alamat Pelanggan -->
                <div class="form-group">
                    <label class="control-label col-sm-2">No Hp</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Pelanggan">{{ old('alamat',@$pelanggan->alamat)}}</textarea>
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
