<?php

namespace App\Http\Controllers;

use App\Models\PelangganModel;
use Illuminate\Http\Request;
 
class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = PelangganModel::all();
        return view('pelanggan.index',compact('pelanggan'));

    }
    public function create(){
        return view('pelanggan.form');
    }
    public function store(Request $request){
        $rules = [
            'nama_pelanggan' => 'required|max:100',
            'no_hp' => 'required|numeric|min:0',
            'alamat' => 'required|string'
        ];
        $request->validate($rules);
        $input = $request->all();
        $status = PelangganModel::create($input);
        return redirect('/pelanggan')->with($status ? 'success': 'error',
        $status ? 'data berhasil ditambahkan' : 'gagal menambahkan data');
    }
    public function show(string $id){
        //
    }
    public function edit(string $id){
        $pelanggan = PelangganModel::findOrFail($id);
        return view('pelanggan.form',compact('pelanggan'));
    }
    public function update(Request $request,string $id){
        $pelanggan = PelangganModel::findOrFail($id);
        $input = $request->all();
        if(
            $pelanggan->nama_pelanggan == $input['nama_pelanggan'] &&
            $pelanggan->no_hp == $input['no_hp'] &&
            $pelanggan->alamat == $input['alamat']
        ){
            return redirect('/pelanggan')->with('info','data tidak ada yang diubah');

        }
        $rules = [
            'nama_pelanggan' => 'required|max:100',
            'no_hp' => 'required|numeric|min:0',
            'alamat' => 'required|string'
        ];
        $request->validate($rules);
        $status = $pelanggan->update($input);
        return redirect('/pelanggan')->with( $status ? 'success' : 'error',
            $status ? 'Data berhasil diedit' : 'Data gagal diedit');
        
    }
    public function destroy(string $id){
        $pelanggan = PelangganModel::findOrFail($id);
        $status = $pelanggan->delete();
        return redirect('/pelanggan')->with( $status ? 'success' : 'error',
            $status ? 'Data berhasil dihapus' : 'Data gagal dihapus');
    }
}
