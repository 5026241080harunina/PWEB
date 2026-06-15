@extends('template')
@section('title', 'Data Pelanggan')
@section('konten')

    <h2>Tambah Data Pelanggan</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('tagihan.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>No Meteran</label><br>
            <input type="text" name="nometeran" id="nometeran" maxlength="10" value="{{ old('nometeran') }}">
        </p>

        <p>
            <label>Penggunaan</label><br>
            <input type="text" name="penggunaan" id="penggunaan" maxlength="20" value="{{ old('penggunaan') }}">
        </p>

        <p>
            <label>Total Tagihan</label><br>
            <input type="text" name="totaltagihan" id="totaltagihan" maxlength="5" value="{{ old('totaltagihan') }}">
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('tagihan.index') }}">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let nometeran = document.getElementById('nometeran').value.trim();
            let meterawal = document.getElementById('meterawal').value.trim();
            let meterakhir = document.getElementById('meterakhir').value.trim();

            if (meterakhir > (meterakhir + 20)) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Nama maksimal 20 karakter",
                    icon: "error"
                });
                return false;
            }

            if (meterakhir != INT) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kelas wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (meterakhir != INT) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kelas wajib diisi",
                    icon: "error"
                });
                return false;
            }

            return true;
        }//
    </script>
@endsection
