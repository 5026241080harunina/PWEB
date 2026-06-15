<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TagihanController extends Controller
{
    public function index()
    {
        // mengambil data tagihan
        $tagihan = DB::table('tagihan_air')->paginate(10);

        return view('tagihan.index', ['tagihan'=>$tagihan]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $tagihan = DB::table('tagihan_air')
        ->where('nometeran','like',"%".$cari."%")
        ->paginate();

        return view('tagihan.index', ['tagihan'=>$tagihan]);
    }

    public function tambah()
    {
        return view('tagihan.tambah');
    }

    public function store(Request $request)
    {
        DB::table('tagihan')->insert([
            'id'=>$request->id,
            'nometeran'=>$request->nometeran,
            'penggunaan(m^3)'=>$request->penggunaan,
            'totaltagihan'=>$request->total
        ]);

        $penggunaan = $request->meteranakhir - $request->meteranawal;
        $total_tagihan = $penggunaan * 5000;

        return redirect('/tagihan');
    }

    public function edit($id)
    {
        $tagihan = DB::table('tagihan_air')
        ->where('nometeran',$nometeran)
        ->get();

        return view('tagihan.edit', ['tagihan'=>$tagihan]);
    }

    public function update(Request $request)
    {
        DB::table('tagihan_air')
        ->where('nometeran',$request->nometeran)
        ->update([
            'nometeran'=>$request->nometeran,
            'penggunaan(m^3)'=>$request->penggunaan,
            'totaltagihan'=>$request->total
        ]);

        return redirect('/tagihan');
    }

    public function hapus($id)
    {
        DB::table('tagihan_air')
        ->where('nometeran',$nometeran)
        ->delete();
        return redirect('/tagihan');
    }

}