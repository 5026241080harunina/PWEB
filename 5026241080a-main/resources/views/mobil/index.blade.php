@extends('template')
@section('title', 'Data Mobil')
@section('konten')

    <h2>Data Mobil</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('mobil.create') }}">Tambah Mobil</a>

    <br><br>

    <table class="table table-striped table-hover">

        <tr>
            <th>Kode Mobil</th>
            <th>Merk Mobil</th>
            <th>Stock Mobil</th>
            <th>Tersedia</th>
            <th>Aksi</th>
        </tr>



        @forelse($mobil as $row)

        <tr>

            <td>{{ $row->kodemobil }}</td>
            <td>{{ $row->merkmobil }}</td>
            <td>{{ $row->stockmobil }}</td>
            <td>{{ $row->tersedia }}</td>
            <td>
                <a href="{{ route('mobil.edit', $row->kodemobil) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('mobil.destroy', $row->kodemobil) }}" method="POST" style="display:inline;"
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                    class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>

        @empty
            <tr>
                <td colspan="5">Belum ada data mobil.</td>
            </tr>

        @endforelse
    </table>
@endsection