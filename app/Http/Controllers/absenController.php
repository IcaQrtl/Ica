<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;
use App\Models\Absen;
use Alert;
class absenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nama = $user->name;

        $absen = absen::join('nilais','absens.id_nilai', '=', 'nilais.id')
                        ->select('nilais.*','absens.*')
                        ->where('nilais.created_by', $nama)
                        ->get();
        
        $title = 'Hapus Absen!';
        $text = "Kamu yakin hapus absen ini ?";
        confirmDelete($title, $text); 

        return view('dataabsen', compact('user', 'absen'));
    }

    public function edit($id){
        $data = absen::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $absen = absen::find($req->get('id'));

        $validate = $req->all([
            'NISN' => 'required',
            'matapelajaran' => 'required',
            'hadir' => 'required',
            'sakit' => 'required',
            'ijin' => 'required',
            'alpha' => 'required',
            'created_by' => 'required',
        ]);

        $absen->hadir = $req->get('hadir');
        $absen->sakit = $req->get('sakit');
        $absen->ijin = $req->get('ijin');
        $absen->alpha = $req->get('alpha');
        $total = $absen->hadir + $absen->sakit + $absen->ijin + $absen->alpha;
        $absen->total = $total;
        $absen->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $nilai = absen::find($id);        

        $nilai->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
