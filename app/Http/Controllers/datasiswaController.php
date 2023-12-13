<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datasiswa;
use App\Models\datakelas;
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

    // public function store(Request $request){

    //     $validate = $request->all([
    //         'NISN' => 'required|max:255',
    //         'nama' => 'reuquired',
    //         'tempat_lahir' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'alamat' => 'required',
    //         'notlpn' => 'required',
    //         'jeniskelamin' => 'required',
    //     ]);

    //     datasiswa::Create($request->all());

    //     $notification = array(
    //         'message' => 'Input data berhasil',
    //         'alert-type' => 'succes'
    //     );

    //     return redirect()->route('datasiswa')->with($notification);
    // }

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
    }

    public function delete($id){
        $siswa = datasiswa::find($id);        

        $siswa->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
