@extends('template')
@section('title', 'Tambah Mobil')
@section('konten')

<h2>Tambah Mobil</h2>

<form action="{{ route('mobil.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Merk Mobil</label>

        <input type="text"
        name="merkmobil"
        class="form-control"
        required>
    </div>

    <br>

    <div class="form-group">
        <label>Stock Mobil</label>

        <input type="number"
        name="stockmobil"
        class="form-control"
        required>

    </div>

    <br>

    <div class="form-group">
        <label>Tersedia</label>

        <select name="tersedia" class="form-control" required>
            <option value="Y">Y</option>
            <option value="N">N</option>
        </select>
    </div>

    <br>

    <button type="submit"
    class="btn btn-primary">Simpan</button>

    <a href="{{ route('mobil.index') }}"
    class="btn btn-secondary">Kembali</a>
</form>


@endsection