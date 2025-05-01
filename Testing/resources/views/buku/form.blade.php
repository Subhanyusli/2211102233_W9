<!DOCTYPE html>
<html>
<head>
    <title>Subhan</title>
    <style>
        input, button {
            margin: 4px 0;
            display: block;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    <h1>Nama : Subhan Yusli Ardian</h1>
    <h1>NIM : 2211102233</h1>
    <h1>Form Buku</h1>

    <form action="{{ isset($edit) ? route('buku.update', $edit->id) : route('buku.store') }}" method="POST">
        @csrf
        @if (isset($edit))
            @method('PUT')
        @endif

        <input type="text" name="judul" placeholder="Judul Buku" value="{{ $edit->judul ?? '' }}" required>
        <input type="text" name="pengarang" placeholder="Pengarang" value="{{ $edit->pengarang ?? '' }}" required>
        <button type="submit">{{ isset($edit) ? 'Update' : 'Simpan' }}</button>
    </form>

    <h2>Daftar Buku</h2>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $buku)
                <tr>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}">Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
