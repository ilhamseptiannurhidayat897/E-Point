@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-white mb-6">Catat Pelanggaran Baru</h1>

<form action="{{ route('violations.store') }}" method="POST" class="space-y-4 bg-[#1e1e2f] p-6 rounded-xl border border-gray-700">
    @csrf

    <div>
        <label class="text-gray-300">Siswa</label>
        <select name="student_id" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
            @foreach ($students as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="text-gray-300">Jenis Pelanggaran</label>
        <select name="violation_type_id" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
            @foreach ($types as $t)
                <option value="{{ $t->id }}">{{ $t->name }} ({{ $t->points }} poin)</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="text-gray-300">Tanggal Pelanggaran</label>
        <input type="date" name="violation_date" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
    </div>

    <div>
        <label class="text-gray-300">Catatan (opsional)</label>
        <textarea name="notes" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700"></textarea>
    </div>

    <button class="px-4 py-2 bg-[#f72585] rounded hover:bg-[#d81f73]">Simpan</button>
</form>
@endsection
