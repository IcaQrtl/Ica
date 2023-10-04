<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\matapelajaran;

class matapelajaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $matapelajaran = matapelajaran::all();
        return view('matapelajaran', compact('user', 'matapelajaran'));
    }

    public function matapelajaran(Request $request){

        $validate = $request->all([
            'id_mapel' => 'required|max:255',
            'namamapel' => 'reuquired',
        ]);

        matapelajaran::Create($request->all());

        $notification = array(
            'message' => 'Input data berhasil',
            'alert-type' => 'succes'
        );

        return redirect()->route('matapelajaran')->with($notification);
    }
}
