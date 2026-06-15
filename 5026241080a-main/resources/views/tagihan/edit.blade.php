@extends('template')
@section('title', 'Kode Soal tagihan_air')
@section('konten')

    <h2>Edit Tagihan</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tagihan.update', $tagihan->id) }}" method="POST" onsubmit="return validasiForm()">
        @csrf
        @method('PUT')

        <p>
            <label>No Meteran</label><br>
            <input type="text" name="nometeran" id="nometeran" maxlength="6" value="{{ old('nometeran', $tagihan->nometeran) }}">
        </p>

        <p>
            <label>Meter Awal</label><br>
            <input type="text" name="meterawal" id="meterawal" value="{{ old('meterawal', $tagihan->meterawal) }}">
        </p>

        <p>
            <label>Meter Akhir</label><br>
            <input type="text" name="meterakhir" id="meterakhir" value="{{ old('meterakhir', $tagihan->meterakhir) }}">
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('tagihan.index') }}">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let meterawal = document.getElementById('meterawal').value.trim();
            let meterakhir = document.getElementById('meterakhir').value.trim();

            if (meterawal === '' || meterakhir === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Meter Awal dan Meter Akhir wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (isNaN(meterawal) || isNaN(meterakhir)) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Meter Awal dan Meter Akhir harus berupa angka",
                    icon: "error"
                });
                return false;
            }

            meterawal = parseInt(meterawal);
            meterakhir = parseInt(meterakhir);

            if (!(meterakhir > (meterawal + 20))) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Meter Akhir harus lebih besar dari (Meter Awal + 20)",
                    icon: "error"
                });
                return false;
            }

            return true;
        }
    </script>
@endsection