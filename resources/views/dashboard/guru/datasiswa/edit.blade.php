@extends('dashboard.guru.main')

@section('content')

<form action="{{ route('datasiswa.update',$siswa->id) }}" method="POST">
@csrf @method('PUT')
<input name="nis" value="{{ $siswa->nis }}">
<input name="nama" value="{{ $siswa->nama }}">
<select name="jk">
    <option value="L" {{ $siswa->jk=='L'?'selected':'' }}>L</option>
    <option value="P" {{ $siswa->jk=='P'?'selected':'' }}>P</option>
</select>
<input name="kelas" value="{{ $siswa->kelas }}">
<textarea name="alamat">{{ $siswa->alamat }}</textarea>
<button>Update</button>
</form>

@endsection