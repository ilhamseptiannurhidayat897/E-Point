@extends('dashboard.admin.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Kelas</h1>

<form method="POST" action="{{ route('datakelas.store') }}">
@csrf

    <select name="tingkat">
        <option>X</option>
        <option>XI</option>
        <option>XII</option>
    </select>

    <select name="jurusan" id="jurusan">
        <option value="">Pilih Jurusan</option>
        <option>TO</option>
        <option>TJKT</option>
        <option>PPLG</option>
        <option>DPIB</option>
        <option>MPLB</option>
        <option>AKL</option>
        <option>SP</option>
    </select>

    <div id="konsentrasi" style="display:none">
        <select name="konsentrasi">
            <option value="">Pilih Konsentrasi</option>
            <option>GIM</option>
            <option>RPL</option>
        </select>
    </div>

    <input type="number" name="nomor" placeholder="Nomor Kelas">

    <button>Simpan</button>
</form>

<script>
document.getElementById('jurusan').addEventListener('change',function(){
    document.getElementById('konsentrasi').style.display =
        this.value === 'PPLG' ? 'block' : 'none';
});
</script>
@endsection
