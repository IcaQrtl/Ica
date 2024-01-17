<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datakelas;
use App\Models\dataguru;
use App\Models\datasiswa;
use App\Models\matapelajaran;
use App\Models\Nilai;
use App\Models\Absen;
use Alert;

class nilaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nilai = Nilai::where('created_by', $user->name)->get();
        $siswa = datasiswa::all();
        $siswas = datasiswa::all();
        $matapelajaran = matapelajaran::all();            

        $wali = dataguru::leftJoin('datakelas', 'datagurus.id', '=', 'datakelas.wali_id')
                        ->select('datagurus.*')
                        ->whereNull('datakelas.id')
                        ->get();
                        
        $title = 'Hapus Nilai!';
        $text = "Kamu yakin hapus nilai ini ?";
        confirmDelete($title, $text); 

        return view('datanilai', compact('user', 'siswa', 'wali', 'nilai', 'matapelajaran', 'siswas'));
    }

    public function store(Request $req){

        $validate = $req->all([
            'NISN' => 'required|max:255',
            'matapelajaran' => 'required|max:255',
            'nilai' => 'required|max:255',
            'kompetensi_dasar' => 'required',
            'created_by' => 'required',
        ]);

        $nilai = new Nilai;
        $nilai->NISN = $req->get('NISN');
        $nilai->mata_pelajaran = $req->get('matapelajaran');
        $nilai->nilai = $req->get('nilai');
        $nilai->kompetensi_dasar = $req->get('kompetensi_dasar');
        $nilai->created_by = $req->get('created_by');
        $nilai->save();

        $lastNilai = Nilai::latest('id')->value('id');

        $absen = new Absen;
        $absen->id_nilai = $lastNilai;
        $absen->hadir = 0;
        $absen->sakit = 0;
        $absen->ijin = 0;
        $absen->alpha = 0;
        $absen->total = 0;
        $absen->save();

        Alert::success('Berhasil', 'Data Berhasil Dibuat');
        return redirect()->back();
    }

    public function edit($id){
        $data = Nilai::find($id);

        return response()->json($data);
    }

    public function update(Request $req){
        $nilai = Nilai::find($req->get('id'));

        $validate = $req->all([
            'NISN' => 'required|max:255',
            'matapelajaran' => 'required|max:255',
            'nilai' => 'required|max:255',
            'kompetensi_dasar' => 'required',
            'created_by' => 'required',
        ]);

        $nilai->nilai = $req->get('nilai');
        $nilai->kompetensi_dasar = $req->get('kompetensi_dasar');
        $nilai->created_by = $req->get('created_by');
        $nilai->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->back();
    }

    public function delete($id){
        $nilai = Nilai::find($id);        

        $nilai->delete();

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function nilai_siswa()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $siswa = datasiswa::where('user_id',$user_id)->first();

        $nisn = $siswa->NISN;
        $nama = $siswa->nama;

        $absen = absen::join('nilais', 'absens.id_nilai', '=', 'nilais.id')
            ->select('nilais.*', 'absens.*')
            ->where('nilais.NISN', $nisn)
            ->get();

        $title = 'Hapus Absen!';
        $text = "Kamu yakin hapus absen ini ?";
        confirmDelete($title, $text); 

        return view('nilaisiswa', compact('user', 'absen', 'nisn', 'nama'));
    }

    // public function calculateTotalScore($nilai, $absen) {
    //     // Tentukan bobot nilai dan absen sesuai kebutuhan
    //     $bobotNilai = 0.8; // misalnya bobot nilai 80%
    //     $bobotAbsen = 0.2; // misalnya bobot absen 20%
    
    //     // Hitung total nilai dengan bobot
    //     $totalNilai = ($nilai * $bobotNilai) + ($absen * $bobotAbsen);
    
    //     // Return total nilai
    //     return $totalNilai;
    // }
    
}
