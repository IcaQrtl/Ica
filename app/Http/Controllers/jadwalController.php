<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\jadwal;
use Illuminate\Support\Facades\Storage;
use Alert;

class jadwalController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $jadwal = jadwal::select('*')->first();
        
        return view('jadwal', compact('user', 'jadwal'));
    }

    public function store(Request $req)
    {
        $jadwal = Jadwal::find($req->get('id'));

        if($jadwal){
            if($req->hasFile('jadwal')){
                $extension = $req->file('jadwal')->extension();

                $filename = 'jadwal'.time().'.'.$extension;

                $req->file('jadwal')->storeAs(
                    'public/jadwal', $filename
                );

                Storage::delete('public/jadwal/'.$req->get('old-jadwal'));
                $jadwal->file = $filename;
            }else{
                $jadwal->file = $req->get('old-jadwal');
            }
            $jadwal->save();
            Alert::success('Berhasil', 'Data Berhasil Diubah');
            return redirect()->back();
        }else{
            $jadwal = new Jadwal;

            if ($req->hasFile('jadwal')) {
                $extension = $req->file('jadwal')->extension();
                $filename = 'jadwal'.time().'.'.$extension;
                $req->file('jadwal')->storeAs(
                    'public/jadwal', $filename
                );
                $jadwal->file = $filename;
                $jadwal->save();
            }
            Alert::success('Berhasil', 'Data Berhasil Dibuat');
            return redirect()->back();  
        } 
    }

    public function jadwal_siswa()
    {
        $user = Auth::user();
        $files = Jadwal::all();
        // dd($files);
        return view('download', compact('user', 'files'));
    }

    public function download($filename)
    {
        $file = storage_path("app/public/jadwal/{$filename}");

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            abort(404, 'File not found');
        }
    }

}
