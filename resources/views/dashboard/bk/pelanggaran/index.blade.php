@extends('dashboard.bk.main')

@section('content')
<div class="px-4 py-3">

    <!-- Header -->
    
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                    Verifikasi Pelanggaran
                </h1>
                <p class="text-sm text-gray-500">
                    Pelanggaran yang menunggu verifikasi
                </p>
            </div>
            <div class="bg-gradient-to-br from-amber-400 to-orange-500 p-4 rounded-xl shadow-lg">
                <i class="fas fa-clock text-white text-2xl"></i>
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
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Jenis Pelanggaran</th>
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
                                <div class="text-gray-800">{{ $item->jenisPelanggaran->nama }}</div>
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-semibold bg-red-100 text-red-700 border border-red-200">
                                    <i class="fas fa-exclamation-circle text-xs"></i>
                                    {{ $item->jenisPelanggaran->poin }}
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
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-primary/10 text-primary border border-primary/20 hover:bg-primary/20 transition-all">
                                        <i class="fas fa-eye text-xs"></i>
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4">
                                <span class="text-gray-500 text-sm">{{ $item->keterangan ?? '-' }}</span>
                            </td>
                            
                            <td class="px-6 py-4">
                                <form class="flex gap-2 justify-center">
    <button type="button"
        onclick="openVerifikasiPelanggaranModal({{ $item->id }}, 'diterima')"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
               bg-green-100 text-green-700 border border-green-200 hover:bg-green-200 transition-all">
        <i class="fas fa-check text-xs"></i>
        Terima
    </button>

    <button type="button"
        onclick="openVerifikasiPelanggaranModal({{ $item->id }}, 'ditolak')"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
               bg-red-100 text-red-700 border border-red-200 hover:bg-red-200 transition-all">
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
                                        <i class="fas fa-clipboard-check text-primary text-5xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium text-lg mb-2">Tidak Ada Pelanggaran</p>
                                    <p class="text-gray-400 text-sm">Tidak ada pelanggaran yang menunggu verifikasi</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!--modal-->
<div id="verifikasiPelanggaranModal"
     class="fixed inset-0 z-50 hidden items-center justify-center
            bg-[#1f143a]/50 backdrop-blur-sm">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl
                p-6 text-center border border-gray-100">

        <!-- Icon -->
        <div id="vpIcon"
             class="mx-auto mb-4 h-14 w-14 rounded-full flex items-center justify-center">
        </div>

        <!-- Text -->
        <h3 class="text-lg font-semibold text-gray-900 mb-1">
            Konfirmasi Verifikasi
        </h3>

        <p id="vpText"
           class="text-sm text-gray-500 mb-6"></p>

        <!-- Action -->
        <div class="flex justify-center gap-3">
            <button onclick="closeVerifikasiPelanggaranModal()"
                class="px-4 py-2 rounded-lg bg-gray-100
                       hover:bg-gray-200 text-gray-600 transition">
                Batal
            </button>

            <form id="vpForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="vpStatus">

                <button id="vpSubmit"
                    class="px-4 py-2 rounded-lg text-white
                           font-medium shadow-sm transition">
                    Konfirmasi
                </button>
            </form>
        </div>
    </div>
</div>
<script>
function openVerifikasiPelanggaranModal(id, status) {
    const modal = document.getElementById('verifikasiPelanggaranModal')
    const form = document.getElementById('vpForm')
    const text = document.getElementById('vpText')
    const icon = document.getElementById('vpIcon')
    const submit = document.getElementById('vpSubmit')
    const inputStatus = document.getElementById('vpStatus')

    modal.classList.remove('hidden')
    modal.classList.add('flex')

    form.action = `/bk/pelanggaran/${id}`
    inputStatus.value = status

    if (status === 'diterima') {
        icon.className = 'mx-auto mb-4 h-14 w-14 rounded-full bg-green-50 flex items-center justify-center'
        icon.innerHTML = `<i class="fas fa-check text-green-600 text-xl"></i>`

        text.innerHTML = `Pelanggaran akan <span class="text-green-600 font-medium">DITERIMA</span>
                          dan poin akan ditambahkan.`
        submit.className = 'px-4 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-medium transition'
    } else {
        icon.className = 'mx-auto mb-4 h-14 w-14 rounded-full bg-red-50 flex items-center justify-center'
        icon.innerHTML = `<i class="fas fa-times text-red-600 text-xl"></i>`

        text.innerHTML = `Pelanggaran akan <span class="text-red-600 font-medium">DITOLAK</span>
                          dan tidak akan diproses.`
        submit.className = 'px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white font-medium transition'
    }
}

function closeVerifikasiPelanggaranModal() {
    document.getElementById('verifikasiPelanggaranModal').classList.add('hidden')
}
</script>

@endsection