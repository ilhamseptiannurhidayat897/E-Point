@extends('dashboard.bk.main')

@section('content')

<!-- ================= HEADER ================= -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                Data Siswa
            </h1>
            <p class="text-sm text-gray-500 flex items-center gap-2">
                <i class="fas fa-users text-xs text-primary"></i>
                Total {{ $siswa->total() }} siswa terdaftar
            </p>
        </div>
        
        <div class="flex items-center gap-3">
            <form action="{{ route('bk.siswa.pdf') }}" method="GET" class="flex items-center gap-3">
                <select name="kelas_id" required class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>

                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-primary to-purple-600 text-white rounded-lg font-medium hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-file-pdf"></i>
                    Download PDF
                </button>
            </form>
        </div>
    </div>
</div>

<!-- ================= TABLE ================= -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-primary/5 to-purple-600/5 border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-12">No</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">NIS</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Wali Kelas</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($siswa as $index => $item)
                <tr class="hover:bg-primary/5 transition-all duration-200">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $siswa->firstItem() + $index }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                <span class="text-xs font-bold text-primary">{{ substr($item->nama, 0, 1) }}</span>
                            </div>
                            <span class="font-semibold">{{ $item->nama }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono text-sm">{{ $item->nis }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                            {{ $item->kelas->nama_kelas }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $item->kelas->walikelas->nama }}</td>
                    <td class="px-6 py-4 text-center">
                        <button
                            onclick="openModal({{ $item->id }})"
                            class="px-4 py-2 rounded-lg text-primary font-semibold
                                   bg-primary/10 hover:bg-primary/20 transition-all duration-200 transform hover:scale-105 flex items-center gap-2 mx-auto">
                            <i class="fas fa-eye"></i> 
                            <span>Detail</span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-10 text-center text-gray-500">
                        <div class="flex flex-col items-center gap-3">
                            <i class="fas fa-inbox text-4xl text-gray-300"></i>
                            <p>Belum ada data siswa</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="px-6 py-4 border-t bg-gray-50 flex items-center justify-between">
        <div class="text-sm text-gray-700">
            Menampilkan {{ $siswa->firstItem() }} hingga {{ $siswa->lastItem() }} dari {{ $siswa->total() }} data
        </div>
        <div class="flex items-center gap-2">
            {{ $siswa->links() }}
        </div>
    </div>
</div>

<!-- ================= MODAL ================= -->
<div id="modalDetail"
     class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center transition-opacity duration-300 opacity-0">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl overflow-hidden transform transition-all duration-300 scale-95" id="modalContainer">

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-purple-600 px-6 py-4 flex justify-between items-center text-white">
            <h3 class="text-lg font-bold flex items-center gap-2">
                <i class="fas fa-user-circle"></i>
                Detail Siswa
            </h3>
            <button onclick="closeModal()" class="hover:bg-white/20 p-2 rounded-lg transition-colors duration-200">
                <i class="fas fa-times"></i>
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
        <div class="mb-6">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white text-xl font-bold">
                    ${s.nama.charAt(0)}
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">${s.nama}</h3>
                    <p class="text-gray-500">NIS: ${s.nis}</p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
                        <i class="fas fa-school text-primary text-xs"></i>
                        Kelas
                    </p>
                    <p class="font-semibold">${s.kelas}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
                        <i class="fas fa-chalkboard-teacher text-primary text-xs"></i>
                        Wali Kelas
                    </p>
                    <p class="font-semibold">${s.walikelas}</p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-exclamation-triangle text-red-500"></i>
                Pelanggaran
            </h4>
            <div class="bg-red-50 rounded-lg p-4">
                ${
                    s.pelanggaran.length
                    ? `<div class="space-y-2">
                        ${s.pelanggaran.map(p => `
                            <div class="flex items-start gap-3 pb-2 border-b border-red-100 last:border-0">
                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-times text-red-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">${p.nama}</p>
                                    <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                                        <span class="text-red-600 font-semibold">-${p.poin} poin</span>
                                        <span>${p.tanggal}</span>
                                    </div>
                                </div>
                            </div>
                        `).join('')}
                    </div>`
                    : '<p class="text-gray-400 text-sm flex items-center gap-2"><i class="fas fa-check-circle text-green-500"></i> Tidak ada pelanggaran</p>'
                }
            </div>
        </div>

        <div>
            <h4 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                <i class="fas fa-trophy text-green-500"></i>
                Prestasi
            </h4>
            <div class="bg-green-50 rounded-lg p-4">
                ${
                    s.prestasi.length
                    ? `<div class="space-y-2">
                        ${s.prestasi.map(p => `
                            <div class="flex items-start gap-3 pb-2 border-b border-green-100 last:border-0">
                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-medal text-green-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">${p.nama}</p>
                                    <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                                        <span class="text-green-600 font-semibold">+${p.poin} poin</span>
                                        <span>${p.tanggal}</span>
                                    </div>
                                </div>
                            </div>
                        `).join('')}
                    </div>`
                    : '<p class="text-gray-400 text-sm flex items-center gap-2"><i class="fas fa-info-circle text-blue-500"></i> Tidak ada prestasi</p>'
                }
            </div>
        </div>
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