<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $satuanOptions = $this->getEnumValues('t_produk', 'satuan');
        return view('produk.form', compact('satuanOptions'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_produk'         => 'required|max:100',
            'harga_jual_produk'   => 'required|numeric|min:0',
            'harga_beli_produk'   => 'required|numeric|min:0',
            'deskripsi'           => 'required|string',
            'stok_produk'         => 'required|integer|min:0',
            'satuan'              => 'required|string|in:' . implode(',', $this->getEnumValues('t_produk', 'satuan')),
        ];
        $request->validate($rules);

        $input = $request->all();
        $status = ProdukModel::create($input);

        return redirect('/produk')->with(
            $status ? 'success' : 'error',
            $status ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan'
        );
    }

    public function show(string $id)
    {
        // Tidak digunakan saat ini
    }

    public function edit(string $id)
    {
        $produk = ProdukModel::findOrFail($id);
        $satuanOptions = $this->getEnumValues('t_produk', 'satuan');

        return view('produk.form', compact('produk', 'satuanOptions'));
    }

    public function update(Request $request, string $id)
    {
        $produk = ProdukModel::findOrFail($id);
        $input = $request->all();

        // Cek apakah ada perubahan
        if (
            $produk->nama_produk         === $input['nama_produk'] &&
            $produk->harga_jual_produk   == $input['harga_jual_produk'] &&
            $produk->harga_beli_produk   == $input['harga_beli_produk'] &&
            $produk->deskripsi           === $input['deskripsi'] &&
            $produk->stok_produk         == $input['stok_produk'] &&
            $produk->satuan              === $input['satuan']
        ) {
            return redirect('/produk')->with('info', 'Data tidak ada yang diubah');
        }

        $rules = [
            'nama_produk'         => 'required|max:100',
            'harga_jual_produk'   => 'required|numeric|min:0',
            'harga_beli_produk'   => 'required|numeric|min:0',
            'deskripsi'           => 'required|string',
            'stok_produk'         => 'required|integer|min:0',
            'satuan'              => 'required|string|in:' . implode(',', $this->getEnumValues('t_produk', 'satuan')),
        ];
        $request->validate($rules);

        $status = $produk->update($input);

        return redirect('/produk')->with(
            $status ? 'success' : 'error',
            $status ? 'Data berhasil diedit' : 'Data gagal diedit'
        );
    }

    public function destroy(string $id)
    {
        $produk = ProdukModel::findOrFail($id);
        $status = $produk->delete();

        return redirect('/produk')->with(
            $status ? 'success' : 'error',
            $status ? 'Data berhasil dihapus' : 'Data gagal dihapus'
        );
    }

    /**
     * Ambil nilai enum dari kolom di tabel MySQL
     */
    private function getEnumValues($table, $column)
{
    $result = DB::select("SHOW COLUMNS FROM `$table` WHERE Field = ?", [$column]);

    if (!isset($result[0]->Type)) {
        return [];
    }

    preg_match('/^enum\((.*)\)$/', $result[0]->Type, $matches);

    return array_map(
        fn($value) => trim($value, "'"),
        explode(',', $matches[1] ?? '')
    );
}

}
