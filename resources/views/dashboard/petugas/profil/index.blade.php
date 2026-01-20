@extends('layouts.app')

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
        <tr>
            <th>Email</th>
            <td>{{ $petugas->user->email }}</td>
        </tr>
    </table>

    <a href="{{ route('petugas.edit') }}" class="btn btn-warning">
        Ubah Password
    </a>
</div>
@endsection
