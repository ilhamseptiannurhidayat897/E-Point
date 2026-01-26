<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Siswa Wali Kelas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h2 { text-align: center; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #eee; text-align: center; }
        td { vertical-align: middle; }
        .center { text-align: center; }
    </style>
</head>
<body>

<h2>REKAP DATA SISWA WALI KELAS</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Poin</th>
            <th>Pelanggaran</th>
            <th>Prestasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $i => $s)
        <tr>
            <td class="center">{{ $i + 1 }}</td>
            <td>{{ $s['nama'] }}</td>
            <td class="center">{{ $s['nis'] }}</td>
            <td class="center">{{ $s['kelas'] }}</td>
            <td class="center">{{ $s['poin'] }}</td>
            <td class="center">{{ $s['pelanggaran'] }}</td>
            <td class="center">{{ $s['prestasi'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
