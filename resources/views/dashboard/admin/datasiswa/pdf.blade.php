<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            text-align: center;
        }
    </style>
</head>
<body>

<h3>DATA SISWA</h3>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="20%">NIS</th>
            <th width="45%">Nama Siswa</th>
            <th width="30%">Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $no => $s)
        <tr>
            <td align="center">{{ $no + 1 }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
