<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InherictController extends Controller
{
    //function bmi
    public function bmi(Request $request)
    {
        //deklarasi variabel
        $name = $request->name;//mengambil dari inputan nama
        $hobi = $request->hobi;//mengambil dari inputan hobi
        $bb = $request->bb;//mengambil dari inputan bb
        $tb = $request->tb;//mengambil dari inputan tb

        $bmi = $bb / (($tb / 100) * 2);//menghitung bmi dg rumus

        //mengecek status bmi dengan if else
        if ($bmi < 18.5) {
            $status = 'Kurus';
        } else if ($bmi <= 22.9) {
            $status = 'Normal';
        } else if ($bmi <= 29.9) {
            $status = 'Gemuk';
        } else if ($bmi >= 30) {
            $status = 'Obesitas';
        } else {
            $status = 'Tidak ditemukan';
        }

        $thnLahir = $request->thn;
        $umur = new konsultasi($thnLahir, $status);

        $u = $umur->hitungUmur();//Menampilkan umur dari fungsi umur
        $k = $umur->konsultasi();//menampilkan status konsultasi dari fungsi konsultasi

        $data = [
            'name' => $name,
            'hobi' => $hobi,
            'bb' => $bb,
            'tb' => $tb,
            'status' => $status,
            'umur' => $u,
            'konsultasi' => $k,
        ];
        return view('home', compact('data'));
    }
}

// Class umur
class umur
{
    public $tgl; //Deklarasi variabel dg encapsulation public
    public function __construct($tgl, $status)
    {
        $this->tgl = $tgl;
        $this->status = $status;
    }
    public function hitungUmur()
    {
        $this->umur = 2022 - $this->tgl;
        return $this->umur;
    }
}

// class konsultasi inherict umur
class konsultasi extends umur
{
    public function konsultasi()
    {
        // cek dewasa belum dewasa
        if ($this->hitungUmur() >= 17) {
            $status_dewasa = 'Dewasa';
        } else {
            $status_dewasa = 'Belum Dewasa';
        }

        // Cek status konsultasi
        if ($status_dewasa == 'Dewasa' && $this->status == 'Obesitas') {
            return 'Anda bisa mendapatkan Konsultasi gratis.';
        } else {
            return 'Maaf anda tidak dapat konsultasi gratis.';
        }
    }
}
