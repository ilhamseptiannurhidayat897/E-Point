@extends('dashboard.siswa.sidebar')

@section('title','Riwayat E-Point')

@section('content')

<!-- FILTER -->
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h3 class="text-lg font-bold text-primary">Riwayat Poin Siswa</h3>

        <div class="flex gap-3">
            <select class="px-4 py-2 border rounded-lg text-sm focus:ring-primary focus:border-primary">
                <option>Bulan Ini</option>
                <option>Tahun Ini</option>
            </select>

            <select class="px-4 py-2 border rounded-lg text-sm focus:ring-primary focus:border-primary">
                <option>Semua</option>
                <option>Kebaikan</option>
                <option>Pelanggaran</option>
            </select>
        </div>
    </div>
</div>

<!-- ================= DESKTOP TABLE ================= -->
<div class="hidden md:block bg-white rounded-xl shadow p-6">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-gray-600 text-left">
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Jenis</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Keterangan</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($riwayat as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                    </td>

                    <td class="px-4 py-3">
                        <span class="px-3 py-1 text-xs rounded-full
                            {{ $item->jenis === 'kebaikan'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($item->jenis) }}
                        </span>
                    </td>

                    <td class="px-4 py-3 font-semibold
                        {{ $item->jenis === 'kebaikan' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $item->jenis === 'kebaikan' ? '+' : '-' }}{{ $item->jumlah }}
                    </td>

                    <td class="px-4 py-3">{{ $item->keterangan }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">
                        Belum ada riwayat poin
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ================= MOBILE CARD ================= -->
<div class="md:hidden space-y-4">
    @forelse($riwayat as $item)
    <div class="bg-white rounded-xl shadow p-4">
        <div class="flex justify-between items-center mb-2">
            <span class="text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
            </span>

            <span class="px-3 py-1 text-xs rounded-full
                {{ $item->jenis === 'kebaikan'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-red-100 text-red-700' }}">
                {{ ucfirst($item->jenis) }}
            </span>
        </div>

        <div class="flex justify-between items-center">
            <p class="text-gray-700">{{ $item->keterangan }}</p>
            <p class="font-bold
                {{ $item->jenis === 'kebaikan' ? 'text-green-600' : 'text-red-600' }}">
                {{ $item->jenis === 'kebaikan' ? '+' : '-' }}{{ $item->jumlah }}
            </p>
        </div>
    </div>
    @empty
    <p class="text-center text-gray-500">Belum ada riwayat poin</p>
    @endforelse
</div>

@endsection
