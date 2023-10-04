<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datasiswa;

class datasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $datasiswa = datasiswa::all();
        return view('datasiswa', compact('user', 'datasiswa'));
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

        datasiswa::Create($request->all());

        $notification = array(
            'message' => 'Input data berhasil',
            'alert-type' => 'succes'
        );

        return redirect()->route('datasiswa')->with($notification);
    }
}
