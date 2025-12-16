@extends('dashboard.guru.main')

@section('content')
    <form action="{{ route('datasiswa.store') }}" method="POST">
    @csrf
        <input name="nis" placeholder="NIS">
        <input name="nama" placeholder="Nama">
        <select name="jk">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <input name="kelas" placeholder="Kelas">
        <textarea name="alamat" placeholder="Alamat"></textarea>
        <button>Simpan</button>
    </form>
@endsection
