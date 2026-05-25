<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //
    public function index(){
    return "<h1>Halo ini adalah method index, dalam controller DosenController. - www.malasngoding.com</h1>";
    }

    public function biodata(){
        $nama = "Harunina Irene Syafira";
        $umur = 20;
        $matkul = ["Algoritma & Pemrograman","Kalkulus","Pemrograman Web"];
    	return view('biodata',['nama' => $nama, 'umur' => $umur, 'matkul' => $matkul]);
    }
}

