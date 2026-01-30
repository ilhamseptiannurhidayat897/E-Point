@extends('dashboard.bk.main')

@section('content')
<div class="px-4 py-3">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                    Verifikasi Prestasi Siswa
                </h1>
                <p class="text-sm text-gray-500">
                    Prestasi yang menunggu verifikasi
                </p>
            </div>
            <div class="bg-gradient-to-br from-amber-400 to-orange-500 p-4 rounded-xl shadow-lg">
                <i class="fas fa-trophy text-white text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-primary/5 to-purple-600/5 border-b border-gray-200">
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700" style="width: 60px;">No</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Siswa</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Jenis Prestasi</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Poin</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Petugas</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Foto</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Keterangan</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($data as $item)
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
                                <div class="text-gray-800">{{ $item->jenis->nama }}</div>
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-green-100 text-green-700 border border-green-200">
                                    <i class="fas fa-plus text-xs"></i>
                                    {{ $item->jenis->poin }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4">
                                <span class="text-gray-700">{{ $item->pelapor }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                @if($item->foto)
                                    <a href="{{ asset('storage/'.$item->foto) }}" 
                                       target="_blank"
                                       class="inline-block">
                                        <img src="{{ asset('storage/'.$item->foto) }}" 
                                             alt="Foto Prestasi" 
                                             class="w-12 h-12 rounded-lg object-cover border-2 border-gray-200 hover:border-primary transition-colors">
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4">
                                <span class="text-gray-500 text-sm">{{ $item->keterangan ?? '-' }}</span>
                            </td>
                            
                            <td class="px-6 py-4">
                                <form action="{{ route('bk.prestasi.verifikasi', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin memverifikasi?')"
                                      class="flex gap-2 justify-center">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit"
                                            name="status"
                                            value="diterima"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-green-100 text-green-700 border border-green-200 hover:bg-green-200 transition-all"
                                            title="Terima">
                                        <i class="fas fa-check text-xs"></i>
                                        Terima
                                    </button>

                                    <button type="submit"
                                            name="status"
                                            value="ditolak"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-red-100 text-red-700 border border-red-200 hover:bg-red-200 transition-all"
                                            title="Tolak">
                                        <i class="fas fa-times text-xs"></i>
                                        Tolak
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                                        <i class="fas fa-trophy text-primary text-5xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium text-lg mb-2">Tidak Ada Prestasi</p>
                                    <p class="text-gray-400 text-sm">Tidak ada prestasi yang menunggu verifikasi</p>
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