@extends('template')
@section('title', 'Data Siswa')
@section('konten')

    <h2>Data Siswa</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('siswa.create') }}">Tambah Siswa</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>NRP</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>

        @forelse($siswa as $row)
            <tr>
                <td>{{ $row->NRP }}</td>
                <td>{{ $row->Nama }}</td>
                <td>{{ $row->Kelas }}</td>
                <td>{{ $row->TanggalLahir }}</td>
                <td>
                    <a href="{{ route('siswa.edit', $row->NRP) }}" class="btn btn-warning">Edit</a>


                    <form action="{{ route('siswa.destroy', $row->NRP) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data siswa.</td>
            </tr>
        @endforelse
    </table>
@endsection
