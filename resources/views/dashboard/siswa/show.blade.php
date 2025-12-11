@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold text-white mb-4">
        Detail Siswa: {{ $student->name }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-[#1e1e2f] p-4 rounded-lg text-white">
            <h3 class="text-lg">NIS</h3>
            <p class="text-xl font-bold">{{ $student->nis }}</p>
        </div>

        <div class="bg-[#1e1e2f] p-4 rounded-lg text-white">
            <h3 class="text-lg">Kelas</h3>
            <p class="text-xl font-bold">{{ $student->tingkat }} {{ $student->jurusan }} {{ $student->kelas }}</p>
        </div>

        <div class="bg-[#1e1e2f] p-4 rounded-lg text-white">
            <h3 class="text-lg">Net Poin</h3>
            <p class="text-xl font-bold text-[#4cc9f0]">{{ $student->summary->net_points ?? 0 }}</p>
        </div>

    </div>

    <!-- RIWAYAT -->
    <h2 class="text-xl font-bold text-white mt-6 mb-3">Riwayat Pelanggaran</h2>
    <div class="bg-[#1e1e2f] p-4 rounded-lg text-white">
        @foreach ($student->violations as $v)
            <div class="border-b border-gray-700 py-2">
                <strong>{{ $v->type->name }}</strong>
                <span class="text-sm text-gray-400">({{ $v->violation_date }})</span>
            </div>
        @endforeach
    </div>

    <h2 class="text-xl font-bold text-white mt-6 mb-3">Riwayat Poin Kebaikan</h2>
    <div class="bg-[#1e1e2f] p-4 rounded-lg text-white">
        @foreach ($student->goodPoints as $g)
            <div class="border-b border-gray-700 py-2">
                <strong>{{ $g->type->name }}</strong>
                <span class="text-sm text-gray-400">({{ $g->given_at }})</span>
            </div>
        @endforeach
    </div>

</div>
@endsection
