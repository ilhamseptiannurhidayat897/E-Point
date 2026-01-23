@extends('dashboard.bk.main')

@section('content')
<div class="px-4 py-3">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                    Riwayat Verifikasi Pelanggaran
                </h1>
                <p class="text-sm text-gray-500">
                    Data pelanggaran yang telah diverifikasi
                </p>
            </div>
            <div class="bg-gradient-to-br from-red-500 to-pink-600 p-4 rounded-xl shadow-lg">
                <i class="fas fa-history text-white text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-primary/5 to-purple-600/5 border-b border-gray-200">
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700" style="width: 60px;">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Siswa</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Pelanggaran</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Poin</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data as $item)
                        <tr class="hover:bg-primary/5 transition-all duration-200">
                            <td class="px-6 py-4 text-center">
                                <span class="text-gray-500">{{ $loop->iteration }}</span>
                            </td>
                            
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md">
                                        {{ substr($item->siswa->nama, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $item->siswa->nama }}</p>
                                        <p class="text-xs text-gray-500">{{ $item->siswa->nis }}</p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200 whitespace-nowrap">
                                    <i class="fas fa-graduation-cap text-xs"></i>
                                    {{ $item->siswa->kelas->nama_kelas ?? '-' }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4">
                                <div class="text-gray-800">{{ $item->jenisPelanggaran->nama }}</div>
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-100 text-rose-700 border border-rose-200">
                                    <i class="fas fa-minus text-xs"></i>
                                    {{ $item->jenisPelanggaran->poin }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                @if($item->status == 'diterima')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200">
                                        <i class="fas fa-check-circle text-xs"></i>
                                        Diterima
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-100 text-rose-700 border border-rose-200">
                                        <i class="fas fa-times-circle text-xs"></i>
                                        Ditolak
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                                        <i class="fas fa-history text-primary text-5xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium text-lg mb-2">Belum Ada Riwayat</p>
                                    <p class="text-gray-400 text-sm">Belum ada riwayat verifikasi pelanggaran</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection