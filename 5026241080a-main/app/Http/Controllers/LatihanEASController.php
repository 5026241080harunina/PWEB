<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiKuliahController extends Controller
{

    // menampilkan semua data
    public function index()
    {
        $nilaikuliah = DB::table('nilaikuliah')->paginate(10);

        // konversi nilai huruf dan bobot
        foreach($nilaikuliah as $n){
            if($n->nilaiangka <= 40){
                $n->nilaihuruf = "D";
            } else if($n->nilaiangka <= 60){
                $n->nilaihuruf = "C";
            } else if($n->nilaiangka <= 80){
                $n->nilaihuruf = "B";
            } else {
                $n->nilaihuruf = "A";
            }

            $n->bobot = $n->nilaiangka * $n->sks;
        }


        return view('index', ['nilaikuliah'=>$nilaikuliah]);
    }


    // halaman tambah data
    public function tambah()
    {
        return view('tambah');
    }


    // simpan data baru
    public function store(Request $request)
    {

        DB::table('nilaikuliah')->insert([
            'nrp' => $request->nrp,
            'nilaiangka' => $request->nilaiangka,
            'sks' => $request->sks
        ]);


        return redirect('/nilaikuliah');

    }


    // halaman edit
    public function edit($id)
    {

        $nilaikuliah = DB::table('nilaikuliah')
                        ->where('id',$id)
                        ->get();


        return view('edit',
            ['nilaikuliah'=>$nilaikuliah]
        );

    }



    // update data
    public function update(Request $request)
    {

        DB::table('nilaikuliah')
        ->where('id',$request->id)
        ->update([

            'nrp'=>$request->nrp,
            'nilaiangka'=>$request->nilaiangka,
            'sks'=>$request->sks

        ]);


        return redirect('/nilaikuliah');

    }



    // hapus data
    public function hapus($id)
    {

        DB::table('nilaikuliah')
        ->where('id',$id)
        ->delete();


        return redirect('/nilaikuliah');

    }


}