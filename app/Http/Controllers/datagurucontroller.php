<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dataguru;
use Alert;

class datagurucontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataguru = dataguru::all();

        $title = 'Hapus Guru!';
        $text = "Kamu yakin hapus guru ini ?";
        confirmDelete($title, $text); 

        return view('dataguru', compact('user', 'dataguru'));
    }

    // public function dataguru(Request $request){

    //     $validate = $request->all([
    //         'NIDN' => 'required|max:255',
    //         'nama' => 'reuquired',
    //         'jeniskelamin' => 'required',
    //         'notlpn' => 'required',
    //     ]);

    //     dataguru::Create($request->all());

    //     return redirect()->route('dataguru')->with($notification);
    // }

    public function edit($id){
        $data = dataguru::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $guru = dataguru::find($req->get('id'));

        $validate = $req->all([
            'nama' => 'required|max:255',
            'jeniskelamin' => 'required',
            'notlpn' => 'required',
        ]);

        $guru->nama = $req->get('nama');
        $guru->jeniskelamin = $req->get('jeniskelamin');
        $guru->notlpn = $req->get('notlpn');
        $guru->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $guru = dataguru::find($id);        

        $guru->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
