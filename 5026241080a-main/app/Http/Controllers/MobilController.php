<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MobilController extends Controller
{
    public function index()
    {
        // mengambil data mobil
        $mobil = DB::table('mobil')->paginate(10);

        return view('mobil.index', ['mobil'=>$mobil]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $mobil = DB::table('mobil')
        ->where('merkmobil','like',"%".$cari."%")
        ->paginate();

        return view('mobil.index', ['mobil'=>$mobil]);
    }

    public function tambah()
    {
        return view('mobil.tambah');
    }

    public function store(Request $request)
    {
        DB::table('mobil')->insert([
            'merkmobil'=>$request->merkmobil,
            'stockmobil'=>$request->stockmobil,
            'tersedia'=>$request->tersedia
        ]);

        return redirect('/mobil');
    }

    public function edit($id)
    {
        $mobil = DB::table('mobil')
        ->where('kodemobil',$id)
        ->get();

        return view('mobil.edit', ['mobil'=>$mobil]);
    }

    public function update(Request $request)
    {
        DB::table('mobil')
        ->where('kodemobil',$request->kodemobil)
        ->update([
            'merkmobil'=>$request->merkmobil,
            'stockmobil'=>$request->stockmobil,
            'tersedia'=>$request->tersedia
        ]);

        return redirect('/mobil');
    }

    public function hapus($id)
    {
        DB::table('mobil')
        ->where('kodemobil',$id)
        ->delete();
        return redirect('/mobil');
    }
}