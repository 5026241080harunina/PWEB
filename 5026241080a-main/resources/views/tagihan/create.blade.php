@extends('template')
@section('title', 'Kode Soal tagihan_air')
@section('konten')

    <h2>Input Tagihan Baru</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tagihan.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Meteran</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nometeran" id="nometeran" maxlength="6" value="{{ old('nometeran') }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Meter Awal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="meterawal" id="meterawal" value="{{ old('meterawal') }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Meter Akhir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="meterakhir" id="meterakhir" value="{{ old('meterakhir') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let meterawal = document.getElementById('meterawal').value.trim();
            let meterakhir = document.getElementById('meterakhir').value.trim();

            if (isNaN(meterawal) || isNaN(meterakhir) || meterawal === '' || meterakhir === '') {
                alert("Meter Awal dan Meter Akhir harus berupa angka!");
                return false;
            }

            meterawal = parseInt(meterawal);
            meterakhir = parseInt(meterakhir);

            if (!(meterakhir > (meterawal + 20))) {
                alert("Meter Akhir harus lebih besar dari (Meter Awal + 20)!");
                return false;
            }

            return true;
        }
    </script>
@endsection