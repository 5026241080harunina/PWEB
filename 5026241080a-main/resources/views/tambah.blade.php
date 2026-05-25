@extends('template')
@section('title', 'Data Pegawai')
@section('konten')
 <a href="/pegawai" class="btn btn-secondary mb-4">Kembali</a>

    <div class="card">
        <div class="card-header">
            Form Tambah Data Pegawai
        </div>

        <div class="card-body">
            <form action="/pegawai/store" method="post">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                        <input type="number" name="umur" id="umur" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" class="form-control" rows="4" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="Simpan Data" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection