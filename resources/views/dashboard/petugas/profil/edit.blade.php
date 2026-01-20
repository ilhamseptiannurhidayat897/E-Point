@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Ubah Password Petugas</h3>

    <form action="{{ route('petugas.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Password Lama</label>
            <input type="password" name="password_lama" class="form-control">
            @error('password_lama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password_baru" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_baru_confirmation" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
