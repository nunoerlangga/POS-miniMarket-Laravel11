<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        $user = UsersModel::all();
        return view('users.index', compact('user'));
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', ' Login berhasil. Selamat datang kembali!');;
        }

        return back()->withErrors([
            'username' => 'Login gagal, cek kembali username dan password.',
        ]);
    }

    public function create(){
        $roleOptions = $this->getEnumValues('t_users' , 'role');
        return view('users.form',compact('roleOptions'));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'nama_user' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:t_users,username',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:admin,kasir',
        ];
        $request->validate($rules);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $status = UsersModel::create($input);
        return redirect('/users')->with(
            $status ? 'success' : 'error',
            $status ? 'data berhasil ditambahkan' : 'gagal menambahkan data'
        );
    }
    public function edit(string $id)
    {
        $roleOptions = $this->getEnumValues('t_users' , 'role');
        $user = UsersModel::findOrFail($id);
        return view('users.form', compact('user','roleOptions'));
    }
    public function update(Request $request, string $id)
    {
        $user = UsersModel::findOrFail($id);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if (
            $user->nama_user == $input['nama_user'] &&
            $user->username == $input['username'] &&
            $user->password == $input['password'] &&
            $user->role == $input['role']

        ) {
            return redirect('/users')->with('info', 'tidak ada data yang diubah');
        }
        $rules = [
            'nama_user' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:admin,kasir',
        ];
        $request->validate($rules);
        $status = $user->update($input);
        return redirect('/users')->with(
            $status ? 'success' : 'error',
            $status ? 'Data berhasil diedit' : 'Data gagal diedit'
        );
    }
    public function destroy(string $id)
    {
        $user = UsersModel::findOrFail($id);
        $status = $user->delete();
        return redirect('/pelanggan')->with(
            $status ? 'success' : 'error',
            $status ? 'Data berhasil dihapus' : 'Data gagal dihapus'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    private function getEnumValues($table, $column){
        $result = DB::select("SHOW COLUMNS FROM `$table` WHERE Field = ?", [$column]);
        if(!isset($result[0]->Type)){
            return [];
        }
        preg_match('/^enum\((.*)\)$/',$result[0]->Type, $matches);
         return array_map(
        fn($value) => trim($value, "'"),
        explode(',', $matches[1] ?? '')
    );
    }
}
