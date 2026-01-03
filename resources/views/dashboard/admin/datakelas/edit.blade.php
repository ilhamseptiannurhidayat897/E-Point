@extends('dashboard.admin.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Data Kelas</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('datakelas.update',$kelas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tingkat -->
            <div class="mb-3">
                <label>Tingkat</label>
                <select name="tingkat" class="form-control">
                    @foreach(['X','XI','XII'] as $t)
                        <option value="{{ $t }}" {{ $kelas->tingkat==$t?'selected':'' }}>
                            {{ $t }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Jurusan -->
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    @foreach(['TO','TJKT','PPLG','DPIB','MPLB','AKL','SP'] as $j)
                        <option value="{{ $j }}" {{ $kelas->jurusan==$j?'selected':'' }}>
                            {{ $j }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Konsentrasi -->
            <div class="mb-3" id="konsentrasi-box" style="{{ $kelas->jurusan=='PPLG'?'':'display:none' }}">
                <label>Konsentrasi (PPLG)</label>
                <select name="konsentrasi" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="GIM" {{ $kelas->konsentrasi=='GIM'?'selected':'' }}>GIM</option>
                    <option value="RPL" {{ $kelas->konsentrasi=='RPL'?'selected':'' }}>RPL</option>
                </select>
            </div>

            <!-- Nomor -->
            <div class="mb-3">
                <label>Nomor Kelas</label>
                <input type="number" name="nomor" value="{{ $kelas->nomor }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('datakelas.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script>
document.getElementById('jurusan').addEventListener('change',function(){
    document.getElementById('konsentrasi-box').style.display =
        this.value === 'PPLG' ? 'block' : 'none';
});
</script>
@endsection
