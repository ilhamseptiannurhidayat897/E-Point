@extends('dashboard.petugas.main')

@section('content')
<div class="container">
    <h3>Profil Petugas</h3>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $petugas->nama }}</td>
        </tr>
        <tr>
            <th>NK</th>
            <td>{{ $petugas->nk }}</td>
        </tr>
    </table>

    <a href="{{ route('petugas.profil.edit') }}" class="btn btn-warning">
    Ubah Password
    </a>

</div>
@endsection
