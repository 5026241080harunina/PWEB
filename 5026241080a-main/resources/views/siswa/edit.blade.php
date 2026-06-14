@extends('template')
@section('title', 'Data Pegawai')
@section('konten')

    <h2>Edit Siswa</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('siswa.update', $siswa->NRP) }}" method="POST" onsubmit="return validasiForm()">
        @csrf
        @method('PUT')

        <p>
            <label>NRP</label><br>
            <input type="text" name="NRP" id="NRP" maxlength="10" value="{{ old('NRP', $siswa->NRP) }}">
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="Nama" id="Nama" maxlength="20" value="{{ old('Nama', $siswa->Nama) }}">
        </p>

        <p>
            <label>Kelas</label><br>
            <input type="text" name="Kelas" id="Kelas" maxlength="5" value="{{ old('Kelas', $siswa->Kelas) }}">
        </p>

        <p>
            <label>Tanggal Lahir</label><br>
            <input type="date" name="TanggalLahir" id="TanggalLahir"
                value="{{ old('TanggalLahir', $siswa->TanggalLahir) }}">
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('siswa.index') }}">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let nrp = document.getElementById('NRP').value.trim();
            let nama = document.getElementById('Nama').value.trim();
            let kelas = document.getElementById('Kelas').value.trim();
            let tanggal = document.getElementById('TanggalLahir').value;

            if (nrp === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "NRP wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (nrp.length > 10) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "NRP maksimal 10 karakter",
                    icon: "error"
                });
                return false;
            }

            if (nama === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Nama wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (nama.length > 20) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Nama maksimal 20 karakter",
                    icon: "error"
                });
                return false;
            }

            if (kelas === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kelas wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (kelas.length > 5) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kelas maksimal 5 karakter",
                    icon: "error"
                });
                return false;
            }

            if (tanggal === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Tanggal lahir wajib diisi",
                    icon: "error"
                });
                return false;
            }

            return true;
        }
    </script>
@endsection
