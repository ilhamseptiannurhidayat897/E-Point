@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-white mb-6">Catat Poin Kebaikan</h1>

<form action="{{ route('good-points.store') }}" method="POST" class="space-y-4 bg-[#1e1e2f] p-6 rounded-xl border border-gray-700">
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
        <label class="text-gray-300">Jenis Poin Baik</label>
        <select name="good_point_type_id" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
            @foreach ($types as $t)
                <option value="{{ $t->id }}">{{ $t->name }} (+{{ $t->points }} poin)</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="text-gray-300">Tanggal</label>
        <input type="date" name="given_at" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
    </div>

    <div>
        <label class="text-gray-300">Catatan (optional)</label>
        <textarea name="notes" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700"></textarea>
    </div>

    <button class="px-4 py-2 bg-[#4cc9f0] rounded hover:bg-[#3bb0d6]">Simpan</button>
</form>
@endsection
