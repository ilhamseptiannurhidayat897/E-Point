@extends('dashboard.siswa.main')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    {{-- PRESTASI --}}
    {{-- <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Total Prestasi</p>
        <h2 class="text-3xl font-bold text-green-600">
            +{{ $totalPrestasi }}
        </h2>
    </div> --}}

    {{-- PELANGGARAN --}}
    {{-- <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Total Pelanggaran</p>
        <h2 class="text-3xl font-bold text-red-600">
            -{{ $totalPelanggaran }}
        </h2>
    </div> --}}

    {{-- TOTAL POIN --}}
    {{-- <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Total Poin</p>
        <h2 class="text-3xl font-bold
            {{ $totalPoin < 0 ? 'text-red-600' : 'text-primary' }}">
            {{ $totalPoin }}
        </h2>
    </div> --}}

</div>

{{-- STATUS --}}
{{-- <div class="bg-white rounded-xl shadow p-6">

    <h3 class="text-lg font-semibold mb-2">Status Poin</h3>

    @if ($totalPoin >= 0)
        <span class="px-4 py-2 rounded-full bg-green-100 text-green-700">
            Aman
        </span>
    @elseif ($totalPoin < -20 && $totalPoin >= -50)
        <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700">
            Pembinaan
        </span>
    @else
        <span class="px-4 py-2 rounded-full bg-red-100 text-red-700">
            Panggilan BK
        </span>
    @endif --}}

</div>

@endsection
