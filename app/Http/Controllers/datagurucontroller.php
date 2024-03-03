<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\dataguru;
use App\Models\User;
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

    public function store(Request $request){

        $validate = $request->all([
            'NIP' => 'required|max:255',
            'nama' => 'reuquired',
            'jeniskelamin' => 'required',
            'notlpn' => 'required',
        ]);

        if($validate){
            $user = new User;
            $user->username = $request->get('NIP');
            $user->name = $request->get('nama');
            $user->password = Hash::make("12345678");
            $user->role_id = 2;
            $user->save();
    
            $lastUser = User::latest('id')->value('id');
    
            $guru = new dataguru;
            
            $guru->NIP = $request->get('NIP');
            $guru->nama = $request->get('nama');
            $guru->jeniskelamin = $request->get('jeniskelamin');
            $guru->notlpn = $request->get('notlpn');
            $guru->user_id = $lastUser;
            $guru->save();

            $notification = array(
                'message' => 'Input data berhasil',
                'alert-type' => 'succes'
            );
        }else{
            $notification = array(
                'message' => 'Input data gagal',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('dataguru')->with($notification);
    }

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

        $user = User::find($guru->user_id);
        $user->name = $req->get('nama');
        $user->save();

        $guru->nama = $req->get('nama');
        $guru->jeniskelamin = $req->get('jeniskelamin');
        $guru->notlpn = $req->get('notlpn');
        $guru->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $guru = dataguru::find($id);        
        $user = User::find($guru->user_id);

        $guru->delete();
        $user->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
