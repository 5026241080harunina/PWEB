@extends('template')
@section('title', 'Edit Mobil')
@section('konten')

<h2>Edit Mobil</h2>

@foreach($mobil as $m)
<form action="{{ route('mobil.update',$m->kodemobil) }}" method="PUT">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Kode Mobil</label>

        <input type="text"
        class="form-control"
        value="{{ $m->kodemobil }}"
        readonly>
    </div>

    <br>

    <div class="form-group">
        <label>Merk Mobil</label>

        <input type="text"
        name="merkmobil"
        class="form-control"
        value="{{ $m->merkmobil }}"
        required>
    </div>

    <br>

    <div class="form-group">
        <label>Stock Mobil</label>

        <input type="number"
        name="stockmobil"
        class="form-control"
        value="{{ $m->stockmobil }}"
        required>

    </div>

    <br>

    <div class="form-group">
        <label>Tersedia</label>

        <select name="tersedia" class="form-control">

            <option value="Y"
            @if($m->tersedia == 'Y')
            selected
            @endif>
            Y
            </option>

            <option value="N"
            @if($m->tersedia == 'N')
            selected
            @endif>
            N
            </option>
        </select>

    </div>

    <br>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('mobil.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endforeach
@endsection