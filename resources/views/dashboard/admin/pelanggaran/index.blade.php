@extends('dashboard.admin.main')

@section('content')
<div class="p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Pelanggaran</h1>

        {{-- BUTTON TAMBAH (ADMIN & PETUGAS) --}}
        @if(in_array(auth()->user()->role, ['admin','petugas']))
            <a href="{{ route('pelanggaran.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Tambah Pelanggaran
            </a>
        @endif
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">No</th>
                    <th>Siswa</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Poin</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Pelapor</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelanggaran as $item)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>

                    <td>
                        {{ $item->siswa->nama }} <br>
                        <span class="text-xs text-gray-500">
                            {{ $item->siswa->kelas->nama_kelas }}
                        </span>
                    </td>

                    <td>{{ $item->jenis->nama }}</td>
                    <td>{{ $item->jenis->poin }}</td>

                    <td class="px-4 py-2">
                        @if($item->keterangan)
                            <button 
                                onclick="openKeterangan(`{{ $item->keterangan }}`)"
                                class="text-blue-600 hover:underline"
                            >
                                Lihat
                            </button>
                        @else
                            -
                        @endif
                    </td>

                    <td class="px-4 py-2 text-center">
                        @if($item->foto)
                            <img 
                                src="{{ asset('storage/'.$item->foto) }}"
                                alt="Foto Pelanggaran"
                                class="w-16 h-16 object-cover rounded cursor-pointer hover:scale-105 transition"
                                onclick="openImage('{{ asset('storage/'.$item->foto) }}')"
                            >
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>

                    <td>
                        {{ $item->petugas->name ?? 'Admin' }}
                    </td>

                    <td>
                        <span class="px-2 py-1 rounded text-white text-xs
                            {{ $item->status == 'pending' ? 'bg-yellow-500' : '' }}
                            {{ $item->status == 'diterima' ? 'bg-green-600' : '' }}
                            {{ $item->status == 'ditolak' ? 'bg-red-600' : '' }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>

                    {{-- AKSI --}}
                    <td>
                        {{-- VERIFIKASI (ADMIN & BK, STATUS PENDING) --}}
                        @if(in_array(auth()->user()->role, ['admin','bk']) && $item->status == 'pending')
                            <form method="POST"
                                  action="{{ route('pelanggaran.verifikasi', $item->id) }}"
                                  class="flex gap-1">
                                @csrf
                                @method('PATCH')

                                <button name="status" value="diterima"
                                    class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs">
                                    Terima
                                </button>

                                <button name="status" value="ditolak"
                                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">
                                    Tolak
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="p-4 text-center text-gray-500">
                        Data pelanggaran belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div 
            id="keteranganModal"
            class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50"
            onclick="closeKeterangan()"
        >
            <div 
                class="bg-white max-w-lg w-full p-6 rounded shadow"
                onclick="event.stopPropagation()"
            >
                <h3 class="font-bold text-lg mb-4">Keterangan Pelanggaran</h3>
                <p id="keteranganText" class="text-gray-700"></p>

                <div class="text-right mt-4">
                    <button onclick="closeKeterangan()" class="px-4 py-2 bg-gray-600 text-white rounded">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal Preview Foto -->
        <div 
            id="imageModal"
            class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50"
            onclick="closeImage()"
        >
            <img 
                id="modalImage"
                class="max-w-full max-h-full rounded shadow-lg"
            >
        </div>
    </div>

</div>
<script>
function openKeterangan(text) {
    document.getElementById('keteranganText').innerText = text;
    document.getElementById('keteranganModal').classList.remove('hidden');
    document.getElementById('keteranganModal').classList.add('flex');
}

function closeKeterangan() {
    document.getElementById('keteranganModal').classList.add('hidden');
    document.getElementById('keteranganModal').classList.remove('flex');
}

function openImage(src) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageModal').classList.remove('hidden');
    document.getElementById('imageModal').classList.add('flex');
}

function closeImage() {
    document.getElementById('imageModal').classList.add('hidden');
    document.getElementById('imageModal').classList.remove('flex');
}
</script>

@endsection
