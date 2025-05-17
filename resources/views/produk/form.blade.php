@extends('templates/header')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ empty($produk) ? 'Tambah' : 'Edit' }} Data Produk
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data Produk</li>
        <li class="active">{{ empty($produk) ? 'Tambah' : 'Edit' }} Data Produk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('templates/feedback')

    <div class="box">
        <div class="box-header with-border">
            <a href="{{ url('produk') }}" class="btn bg-purple"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-body">
            <form action="{{ empty($produk) ? url('produk/add') : url("produk/$produk->id_produk/edit") }}" class="form-horizontal" method="POST">
                @csrf
                @if (!empty($produk))
                    @method('patch')
                @endif

                <!-- Nama Produk -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk" value="{{ old('nama_produk', @$produk->nama_produk) }}" required>
                    </div>
                </div>

                <!-- Harga Beli Produk -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Harga Beli Produk</label>
                    <div class="col-sm-10">
                        <input type="number" name="harga_beli_produk" class="form-control" placeholder="Masukkan Harga Beli Produk" value="{{ old('harga_beli_produk', @$produk->harga_beli_produk) }}" required>
                    </div>
                </div>
                <!-- Harga Jual Produk -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Harga Jual Produk</label>
                    <div class="col-sm-10">
                        <input type="number" name="harga_jual_produk" class="form-control" placeholder="Masukkan Harga Jual Produk" value="{{ old('harga_jual_produk', @$produk->harga_jual_produk) }}" required>
                    </div>
                </div>
                <!-- Stok Produk -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Stok Produk</label>
                    <div class="col-sm-10">
                        <input type="number" name="stok_produk" class="form-control" placeholder="Masukkan Banyak Stock"  required value="{{ old('stok_produk', @$produk->stok_produk) }}">
                    </div>
                </div>
                <!-- Satuan Produk -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Satuan Produk</label>
                    <div class="col-sm-10">
                        <select name="satuan" class="form-control" required>
                            @foreach ($satuanOptions as $option)
                                <option value="{{ $option }}" {{ (isset($produk) && $produk->satuan == $option) ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- deskripsi Produk -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Produk">{{ old('deskripsi', @$produk->deskripsi) }}</textarea>

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
