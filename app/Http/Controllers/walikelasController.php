<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\dataguru;
use App\Models\datakelas;
use App\Models\datasiswa;
use Alert;

class walikelasController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;

        $wali = dataguru::where('user_id',$user_id)->value('nama');

        $kelas = datakelas::where('wali_id',$wali)->first();

        if ($kelas !== null) {
            $nama_kelas = $kelas->value('nama_kelas') ?? 0; 
        } else {

            Alert::warning('Warning', 'Anda Bukan Wali Kelas');
            return redirect()->back();
        }return redirect()->back();

        $id_kelas = datakelas::where('wali_id',$wali)->first()->value('id');
 
        $siswa = datasiswa::join('nilais', 'datasiswas.NISN', '=', 'nilais.NISN')
                ->join('absens', 'nilais.id', '=', 'absens.id_nilai')
                ->select('datasiswas.*','nilais.*', 'absens.*')
                ->where('datasiswas.kelas_id', $id_kelas)
                ->get();

        return view('walisiswa', compact('user', 'siswa', 'kelas'));
    }
}
