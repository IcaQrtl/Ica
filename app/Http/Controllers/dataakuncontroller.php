<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\dataguru;
use App\Models\datasiswa;
use App\Models\datakelas;
use Alert;
class dataakuncontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $dataakun = User::all();
        $dataakun = User::join('roles', 'users.role_id', '=', 'roles.id')
                        ->select('users.*', 'roles.nama as role_nama')
                        ->get();
        $kelas = datakelas::all();    

        $title = 'Hapus Akun!';
        $text = "Kamu yakin hapus akun ini ?";
        confirmDelete($title, $text); 

        return view('dataakun', compact('user', 'dataakun', 'kelas'));
    }

    public function store(Request $req){

        $validate = $req->all([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        // dd($req->all());

        $user = new User;
        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->password = Hash::make($req->get('password'));
        $user->role_id = $req->get('role_id');
        $user->save();

        $lastUser = User::latest('id')->value('id');

        if($req->get('role_id') == '2'){
            $validate = $req->all([
                'NIDN' => 'required|max:255',
                'nama' => 'required',
                'jeniskelamin' => 'required',
                'notlpn' => 'required',
            ]);

            $guru = new dataguru;
            
            $guru->NIDN = $req->get('NIDN');
            $guru->nama = $req->get('nama');
            $guru->jeniskelamin = $req->get('jeniskelamin');
            $guru->notlpn = $req->get('notlpn');
            $guru->user_id = $lastUser;
            $guru->save();
        }else{
            $validate = $req->all([
                'NISN' => 'required|max:255',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'notlpn' => 'required',
                'jeniskelamin' => 'required',
                'user_id' => 'required',
                'kelas_id' => 'required',
            ]);

            $siswa = new datasiswa;

            $siswa->NISN = $req->get('NISN');
            $siswa->nama = $req->get('nama');
            $siswa->tempat_lahir = $req->get('tempat_lahir');
            $siswa->tanggal_lahir = $req->get('tanggal_lahir');
            $siswa->alamat = $req->get('alamat');
            $siswa->notlpn = $req->get('notlpn');
            $siswa->jeniskelamin = $req->get('jeniskelamin');
            $siswa->user_id = $lastUser;
            $siswa->kelas_id = $req->get('kelas_id');
            $siswa->save();
        }   

        Alert::success('Berhasil', 'Data Berhasil Dibuat');
        return redirect()->back();
    }

    public function edit($id){
        $data = User::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $user = User::find($req->get('id'));

        $validate = $req->all([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $user = User::find($id);        

        $user->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
