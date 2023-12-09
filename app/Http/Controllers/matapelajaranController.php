<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\matapelajaran;
use Alert;
class matapelajaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $matapelajaran = matapelajaran::all();

        $title = 'Hapus Mata Pelajaran!';
        $text = "Kamu yakin hapus mata pelaran ini ?";
        confirmDelete($title, $text); 

        return view('matapelajaran', compact('user', 'matapelajaran'));
    }

    public function store(Request $request){

        $validate = $request->all([
            'id' => 'required',
            'nama' => 'required',
        ]);

        $matapelajaran = new matapelajaran;
        $matapelajaran->id = $req->get('id');
        $matapelajaran->nama = $req->get('nama');
        $matapelajaran->save();

        Alert::success('Berhasil', 'Data Berhasil Dibuat');
        return redirect()->back();
    }

    public function edit($id){
        $data = matapelajaran::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $matapelajaran = matapelajaran::find($req->get('id'));

        $validate = $req->all([
            'nama' => 'required',
        ]);

        $matapelajaran->nama = $req->get('nama');
        $matapelajaran->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $matapelajaran = matapelajaran::find($id);        

        $matapelajaran->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
