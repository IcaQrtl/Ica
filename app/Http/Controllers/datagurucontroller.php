<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dataguru;

class datagurucontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataguru = dataguru::all();
        return view('dataguru', compact('user', 'dataguru'));
    }

    public function dataguru(Request $request){

        $validate = $request->all([
            'NIDN' => 'required|max:255',
            'nama' => 'reuquired',
            'jeniskelamin' => 'required',
            'notlpn' => 'required',
        ]);

        dataguru::Create($request->all());

        $notification = array(
            'message' => 'Input data berhasil',
            'alert-type' => 'succes'
        );

        return redirect()->route('dataguru')->with($notification);
    }
}
