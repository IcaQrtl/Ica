<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\datasiswa;
use App\Models\datakelas;
use App\Models\User;

use Alert;
class datasiswaController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $datasiswa = datasiswa::join('datakelas', 'datasiswas.kelas_id', '=', 'datakelas.id')
                        ->select('datasiswas.*', 'datakelas.nama_kelas as kelas')
                        ->get();
        $kelas = datakelas::all();

        $title = 'Hapus Siswa!';
        $text = "Kamu yakin hapus siswa ini ?";
        confirmDelete($title, $text); 
        
        return view('datasiswa', compact('user', 'datasiswa','kelas'));
    }

    public function store(Request $request){

        $validate = $request->all([
            'NISN' => 'required|max:255',
            'nama' => 'reuquired',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'notlpn' => 'required',
            'jeniskelamin' => 'required',
        ]);

        if($validate){
            $user = new User;
            $user->username = $request->get('NISN');
            $user->name = $request->get('nama');
            $user->password = Hash::make("12345678");
            $user->role_id = 3;
            $user->save();
    
            $lastUser = User::latest('id')->value('id');
    
            $siswa = new datasiswa;
            $siswa->NISN = $request->get('NISN');
            $siswa->nama = $request->get('nama');
            $siswa->tempat_lahir = $request->get('tempat_lahir');
            $siswa->tanggal_lahir = $request->get('tanggal_lahir');
            $siswa->alamat = $request->get('alamat');
            $siswa->notlpn = $request->get('notlpn');
            $siswa->jeniskelamin = $request->get('jeniskelamin');
            $siswa->user_id = $lastUser;
            $siswa->kelas_id = $request->get('kelas_id');
            $siswa->save();
    
            $notification = array(
                'message' => 'Input Data Berhasil',
                'alert-type' => 'succes'
            );
        }else{
            $notification = array(
                'message' => 'Input Data Gagal',
                'alert-type' => 'error'
            );
        }
        
        return redirect()->route('datasiswa')->with($notification);
    }

    public function edit($id){
        $data = datasiswa::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $siswa = datasiswa::find($req->get('id'));

        $validate = $req->all([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'notlpn' => 'required',
            'jeniskelamin' => 'required',
            'kelas_id' => 'required',
        ]);

        if($validate){
            $user = User::find($siswa->user_id);
            $user->name = $req->get('nama');
            $user->save();

            $siswa->nama = $req->get('nama');
            $siswa->tempat_lahir = $req->get('tempat_lahir');
            $siswa->tanggal_lahir = $req->get('tanggal_lahir');
            $siswa->alamat = $req->get('alamat');
            $siswa->notlpn = $req->get('notlpn');
            $siswa->jeniskelamin = $req->get('jeniskelamin');
            $siswa->kelas_id = $req->get('kelas_id');
            $siswa->save();

            Alert::success('Berhasil', 'Data Berhasil Diubah');
            return redirect()->back();
        }else{
            Alert::success('Gagal', 'Data Gagal Diubah');
            return redirect()->back();
        }
        
    }

    public function delete($id){
        $siswa = datasiswa::find($id);        
        $user = User::find($siswa->user_id);

        $siswa->delete();
        $user->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function import(Request $request){
        Excel::import(new SiswaImport, $request->file('file'));

        Alert::success('Berhasil', 'Data Berhasil DiImport');
        return redirect()->route('datasiswa');
    }
}
