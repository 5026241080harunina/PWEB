<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TagihanController extends Controller
{
    public function index()
    {
        // mengambil data tagihan, lalu hitung penggunaan & total tagihan
        $tagihan = DB::table('tagihan_air')->paginate(10);

        foreach ($tagihan as $item) {
            $item->penggunaan = $item->meterakhir - $item->meterawal;
            $item->total_tagihan = $item->penggunaan * 5000;
        }

        return view('tagihan.index', ['tagihan'=>$tagihan]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $tagihan = DB::table('tagihan_air')
        ->where('nometeran','like',"%".$cari."%")
        ->paginate();

        foreach ($tagihan as $item) {
            $item->penggunaan = $item->meterakhir - $item->meterawal;
            $item->total_tagihan = $item->penggunaan * 5000;
        }

        return view('tagihan.index', ['tagihan'=>$tagihan]);
    }

    public function create()
    {
        return view('tagihan.create');
    }

    public function store(Request $request)
    {
        DB::table('tagihan_air')->insert([
            'nometeran'=>$request->nometeran,
            'meterawal'=>$request->meterawal,
            'meterakhir'=>$request->meterakhir,
        ]);

        return redirect('/eas');
    }

    public function edit($id)
    {
        $tagihan = DB::table('tagihan_air')
        ->where('id',$id)
        ->first();

        return view('tagihan.edit', ['tagihan'=>$tagihan]);
    }

    public function update(Request $request, $id)
    {
        DB::table('tagihan_air')
        ->where('id',$id)
        ->update([
            'nometeran'=>$request->nometeran,
            'meterawal'=>$request->meterawal,
            'meterakhir'=>$request->meterakhir,
        ]);

        return redirect('/eas');
    }

    public function hapus($id)
    {
        DB::table('tagihan_air')
        ->where('id',$id)
        ->delete();
        return redirect('/eas');
    }

}