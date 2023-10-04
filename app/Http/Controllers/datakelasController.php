<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datakelas;

class datakelasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $datakelas = datakelas::all();
        return view('datakelas', compact('user', 'datakelas'));
    }

    public function datakelas(Request $request){

        $validate = $request->all([
            'IDkelas' => 'required|max:255',
            'namakelas' => 'reuquired',
        ]);

    datakelas::Create($request->all());
    
    $notification = array(
        'message' => 'Input data berhasil',
        'alert-type' => 'succes'
    );

    return redirect()->route('datakelas')->with($notification);
    }
}
