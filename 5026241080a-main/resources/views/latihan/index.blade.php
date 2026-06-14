@extends('template')

@section('title', 'Nilai Kuliah')

@section('konten')

<a href="/latihan/tambah" class="btn btn-primary">
    Tambah Data
</a>

<br/>
<br/>

<table class="table table-striped table-hover">

    <tr>
        <th>ID</th>
        <th>NRP</th>
        <th>Nilai Angka</th>
        <th>SKS</th>
        <th>Nilai Huruf</th>
        <th>Bobot</th>
        <th>Aksi</th>
    </tr>


    @foreach($latihan as $nilai)

    <tr>
        <td>{{ $nilai->id }}</td>
        <td>{{ $nilai->nrp }}</td>
        <td>{{ $nilai->nilaiangka }}</td>
        <td>{{ $nilai->sks }}</td>
        <td>{{ $nilai->nilaihuruf }}</td>
        <td>{{ $nilai->bobot }}</td>

        <td>
            <a href="/latihan/edit/{{ $p->id }}" 
               class="btn btn-warning">
                Edit
            </a>
            <a href="/latihan/hapus/{{ $p->id }}" 
               class="btn btn-danger">
                Hapus
            </a>
        </td>
    </tr>

    @endforeach


</table>


{{ $latihan->links() }}


@endsection