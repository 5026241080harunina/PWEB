@extends('template')
@section('title', 'Kode Soal tagihan_air')
@section('konten')

    <h2>Data Tagihan Air</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('tagihan.create') }}">Tambah Tagihan</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>No Meteran</th>
            <th>Penggunaan</th>
            <th>Total Tagihan</th>
        </tr>

        @forelse($tagihan as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nometeran }}</td>
                <td>{{ $row->penggunaan }}</td>
                <td>{{ $row->totaltagihan }}</td>
                <td>
                    <a href="{{ route('tagihan.edit', $row->nometeran) }}" class="btn btn-warning">Edit</a>


                    <form action="{{ route('tagihan.destroy', $row->nometeran) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data pelanggan.</td>
            </tr>
        @endforelse
    </table>
@endsection
