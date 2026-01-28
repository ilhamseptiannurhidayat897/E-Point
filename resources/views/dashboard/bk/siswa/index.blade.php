@extends('dashboard.bk.main')

@section('content')

<!-- ================= HEADER ================= -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <!-- Title -->
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                    Data Siswa
                </h1>
                <p class="text-sm text-gray-500">
                    Total {{ $siswa->total() }} siswa terdaftar
                </p>
            </div>

            <!-- Filter & Action -->
            <form action="{{ route('bk.siswa.pdf') }}"
                method="GET"
                class="flex items-center gap-3">

                <!-- Filter Kelas -->
    <div class="relative w-48">
        <select name="kelas_id"
                required
                class="appearance-none w-full
                        px-4 py-2.5 pr-10
                        border border-gray-300 rounded-xl
                        bg-gray-50
                        text-sm font-medium text-gray-800
                        shadow-inner
                        hover:bg-white
                        hover:border-primary
                        focus:bg-white
                        focus:ring-2 focus:ring-primary/30
                        focus:border-primary
                        transition">

            <option value="" class="text-gray-400">
                Pilih Kelas
            </option>

            @foreach ($kelas as $k)
                <option value="{{ $k->id }}"
                        class="text-gray-700 hover:bg-primary/10">
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>

        <!-- Icon dropdown -->
        <i class="fas fa-chevron-down
                absolute right-4 top-1/2 -translate-y-1/2
                text-gray-400 text-xs
                pointer-events-none">
        </i>
    </div>

            <!-- Button -->
            <button type="submit"
                    class="inline-flex items-center gap-2
                            px-5 py-2.5 rounded-xl
                            bg-red-600 hover:bg-red-700
                            text-white text-sm font-semibold
                            shadow-sm hover:shadow-md
                            transition transform hover:scale-105">
                <i class="fas fa-file-pdf"></i>
                Download PDF
            </button>

        </form>

    </div>
</div>


<!-- ================= TABLE ================= -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-primary/5 to-purple-600/5 border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-sm font-semibold">Nama</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">NIS</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Kelas</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Wali Kelas</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($siswa as $item)
                <tr class="hover:bg-primary/5 transition-all duration-200">
                    <td class="px-6 py-4 font-semibold">{{ $item->nama }}</td>
                    <td class="px-6 py-4">{{ $item->nis }}</td>
                    <td class="px-6 py-4">{{ $item->kelas->nama_kelas }}</td>
                    <td class="px-6 py-4">{{ $item->kelas->walikelas->nama }}</td>
                    <td class="px-6 py-4 text-center">
                        <button
                            onclick="openModal({{ $item->id }})"
                            class="px-4 py-2 rounded-lg text-primary font-semibold
                                   bg-primary/10 hover:bg-primary/20 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-10 text-center text-gray-500">
                        Belum ada data siswa
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="px-6 py-4 border-t bg-gray-50">
        {{ $siswa->links() }}
    </div>
</div>

<!-- ================= MODAL ================= -->
<div id="modalDetail"
     class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center transition-opacity duration-300 opacity-0">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl overflow-hidden transform transition-all duration-300 scale-95" id="modalContainer">

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-purple-600 px-6 py-4 flex justify-between items-center text-white">
            <h3 class="text-lg font-bold">Detail Siswa</h3>
            <button onclick="closeModal()" class="hover:bg-white/20 p-2 rounded transition-colors duration-200">
                ✕
            </button>
        </div>

        <!-- Content -->
        <div class="p-6 max-h-[70vh] overflow-y-auto" id="modalContent"></div>
    </div>
</div>

<!-- ================= DATA & SCRIPT ================= -->
<script>
const siswaData = @json($siswaData);

function openModal(id) {
    const s = siswaData[id];
    const modal = document.getElementById('modalDetail');
    const modalContainer = document.getElementById('modalContainer');

    let html = `
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-lg">${s.nama}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">NIS</p>
                <p class="font-semibold">${s.nis}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Kelas</p>
                <p class="font-semibold">${s.kelas}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Wali Kelas</p>
                <p class="font-semibold">${s.walikelas}</p>
            </div>
        </div>

        <hr class="my-4">

        <h4 class="font-bold mb-2">📌 Pelanggaran</h4>
        ${
            s.pelanggaran.length
            ? s.pelanggaran.map(p => `
                <div class="text-sm mb-1">
                    • ${p.nama}
                    <span class="text-red-600 font-semibold">(${p.poin} poin)</span>
                    <span class="text-gray-400 text-xs">- ${p.tanggal}</span>
                </div>
            `).join('')
            : '<p class="text-gray-400 text-sm">Tidak ada pelanggaran</p>'
        }

        <hr class="my-4">

        <h4 class="font-bold mb-2">🏆 Prestasi</h4>
        ${
            s.prestasi.length
            ? s.prestasi.map(p => `
                <div class="text-sm mb-1">
                    • ${p.nama}
                    <span class="text-green-600 font-semibold">(+${p.poin} poin)</span>
                    <span class="text-gray-400 text-xs">- ${p.tanggal}</span>
                </div>
            `).join('')
            : '<p class="text-gray-400 text-sm">Tidak ada prestasi</p>'
        }
    `;

    document.getElementById('modalContent').innerHTML = html;
    
    // Show modal with transition
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');
        modalContainer.classList.remove('scale-95');
        modalContainer.classList.add('scale-100');
    }, 10);
}

function closeModal() {
    const modal = document.getElementById('modalDetail');
    const modalContainer = document.getElementById('modalContainer');
    
    // Hide modal with transition
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    modalContainer.classList.remove('scale-100');
    modalContainer.classList.add('scale-95');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Close modal when clicking outside
document.getElementById('modalDetail').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>

@endsection