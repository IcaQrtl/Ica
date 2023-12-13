<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datakelas;
use App\Models\dataguru;
use Alert;

class datakelasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $datakelas = datakelas::all();
        $datakelas = datakelas::join('datagurus', 'datakelas.wali_id', '=', 'datagurus.id')
                        ->select('datakelas.*', 'datagurus.nama as guru_nama')
                        ->get();
                     
        // $wali = dataguru::all();
        $wali = dataguru::leftJoin('datakelas', 'datagurus.id', '=', 'datakelas.wali_id')
                        ->select('datagurus.*')
                        ->whereNull('datakelas.id')
                        ->get();
                    
        $walis = dataguru::leftJoin('datakelas', 'datagurus.id', '=', 'datakelas.wali_id')
            ->select('datagurus.*')
            ->whereNull('datakelas.id')
            ->get();
        return view('datakelas', compact('user', 'datakelas', 'wali', 'walis'));
    }

    public function store(Request $req){

        $validate = $req->all([
            'kelas' => 'required|max:255',
            'jurusan' => 'required|max:255',
            'nama' => 'required|max:255',
            'wali_id' => 'required',
        ]);

        $kelas = new datakelas;
        $namakelas = $req->get('kelas') . ' ' . $req->get('jurusan') . ' ' . $req->get('nama');
        $kelas->nama_kelas = $namakelas;
        $kelas->wali_id = $req->get('wali');
        $kelas->save();

        Alert::success('Berhasil', 'Data Berhasil Dibuat');
        return redirect()->back();
    }

    public function edit($id){
        $data = datakelas::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $kelas = datakelas::find($req->get('id'));

        $validate = $req->all([
            'wali_id' => 'required',
        ]);

        $kelas->wali_id = $req->get('wali');
        $kelas->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $kelas = datakelas::find($id);        

        $kelas->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
