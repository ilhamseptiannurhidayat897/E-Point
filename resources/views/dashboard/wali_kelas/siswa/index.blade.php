@extends('dashboard.wali_kelas.main')

@section('content')
<!-- ================= HEADER ================= -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                Siswa Kelas Saya
            </h1>
            <p class="text-sm text-gray-500">
                Total {{ $siswa->count() }} siswa di kelas Anda
            </p>
        </div>
        <div class="bg-gradient-to-br from-primary to-purple-600 p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-users text-white text-2xl"></i>
        </div>
    </div>
</div>

<!-- ================= TABLE ================= -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-primary/5 to-purple-600/5 border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">NIS</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($siswa as $item)
                <tr class="hover:bg-primary/5 transition-all duration-200 group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md group-hover:scale-105 transition-transform">
                                {{ substr($item->nama, 0, 1) }}
                            </div>
                            <p class="font-semibold text-gray-800">{{ $item->nama }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-gray-700 font-medium bg-gray-100 px-2 py-1 rounded text-sm">{{ $item->nis }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-primary/10 text-primary border border-primary/20 whitespace-nowrap">
                            <i class="fas fa-graduation-cap text-xs"></i>
                            {{ $item->kelas->nama_kelas ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <!-- Tombol Detail yang Diperbaiki -->
                        <button
                            onclick="openModal({{ $item->id }})"
                            class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary/10 hover:bg-primary/20 text-primary font-semibold rounded-lg transition-all duration-200 border border-primary/20 transform hover:scale-105">
                            <i class="fas fa-eye text-sm"></i>
                            <span>Detail</span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                                <i class="fas fa-users text-primary text-5xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium text-lg mb-2">Tidak Ada Siswa</p>
                            <p class="text-gray-400 text-sm">Belum ada siswa yang terdaftar di kelas Anda</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ================= MODAL ================= -->
<div id="modalDetail"
     class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-opacity duration-300 opacity-0">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-hidden transform transition-all duration-300 scale-95" id="modalContainer">

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-purple-600 px-6 py-5 flex justify-between items-center text-white">
            <div class="flex items-center gap-3">
                <div class="bg-white/20 p-2 rounded-lg">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="text-xl font-bold">Detail Siswa</h3>
            </div>
            <button onclick="closeModal()" class="hover:bg-white/20 p-2 rounded-lg transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Content -->
        <div class="p-6 max-h-[calc(90vh-80px)] overflow-y-auto" id="modalContent">
            <!-- Loading indicator -->
            <div class="flex justify-center items-center py-8">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
            </div>
        </div>
    </div>
</div>

<!-- ================= DATA & SCRIPT ================= -->
@php
    // Prepare data for JavaScript
    $siswaDataArray = [];
    foreach($siswa as $item) {
        $pelanggaranData = [];
        foreach($item->pelanggaran as $p) {
            $pelanggaranData[] = [
                'nama' => $p->jenisPelanggaran->nama ?? '',
                'poin' => $p->jenisPelanggaran->poin ?? 0,
                'tanggal' => $p->tanggal ?? '',
                'status' => $p->status ?? ''
            ];
        }
        
        $prestasiData = [];
        foreach($item->prestasi as $p) {
            $prestasiData[] = [
                'nama' => $p->jenis->nama ?? '',
                'poin' => $p->jenis->poin ?? 0,
                'tanggal' => $p->tanggal ?? '',
                'status' => $p->status ?? ''
            ];
        }
        
        $siswaDataArray[$item->id] = [
            'id' => $item->id,
            'nama' => $item->nama,
            'nis' => $item->nis,
            'kelas' => [
                'nama_kelas' => $item->kelas->nama_kelas ?? ''
            ],
            'pelanggaran' => $pelanggaranData,
            'prestasi' => $prestasiData
        ];
    }
@endphp

<script>
    // Data siswa yang akan digunakan untuk modal
    const siswaData = @json($siswaDataArray);
    
    // Tambahkan ini untuk debugging: lihat data yang dimuat di console browser
    console.log('Data siswa yang dimuat:', siswaData);
    
    function openModal(id) {
        console.log('Mencoba membuka modal untuk ID:', id);
    
        const s = siswaData[id];
        const modal = document.getElementById('modalDetail');
        const modalContainer = document.getElementById('modalContainer');
    
        // Cek apakah data siswa ditemukan
        if (!s) {
            alert('Data siswa dengan ID ' + id + ' tidak ditemukan!');
            console.error('Data siswa tidak ditemukan untuk ID:', id);
            return;
        }
        
        console.log('Data siswa yang akan ditampilkan:', s);
    
        // Pastikan pelanggaran dan prestasi adalah array untuk menghindari error
        const pelanggaran = s.pelanggaran || [];
        const prestasi = s.prestasi || [];
    
        // Hitung total poin dengan aman
        const totalPelanggaran = pelanggaran.reduce((sum, p) => sum + parseInt(p.poin || 0), 0);
        const totalPrestasi = prestasi.reduce((sum, p) => sum + parseInt(p.poin || 0), 0);
        const totalPoin = totalPrestasi - totalPelanggaran;
        const poinColor = totalPoin >= 0 ? 'text-emerald-600' : 'text-rose-600';
        const poinBg = totalPoin >= 0 ? 'bg-emerald-50 border-emerald-200' : 'bg-rose-50 border-rose-200';
    
        let html = `
            <div class="space-y-6">
                <!-- Profile Header -->
                <div class="flex items-center gap-4 pb-4 border-b">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        ${s.nama.charAt(0).toUpperCase()}
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-800">${s.nama}</h2>
                        <p class="text-gray-500">NIS: ${s.nis}</p>
                        <div class="mt-2 flex items-center gap-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-primary/10 text-primary border border-primary/20">
                                <i class="fas fa-graduation-cap text-xs"></i>
                                ${s.kelas.nama_kelas}
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold ${poinColor} ${poinBg} border">
                                <i class="fas fa-star text-xs"></i>
                                ${totalPoin} Poin
                            </span>
                        </div>
                    </div>
                </div>
    
                <!-- Pelanggaran Section -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-bold flex items-center gap-2 text-gray-800">
                            <i class="fas fa-exclamation-circle text-rose-500"></i>
                            Pelanggaran
                        </h4>
                        <span class="text-sm text-gray-500">${totalPelanggaran} poin total</span>
                    </div>
                    ${
                        pelanggaran.length > 0
                        ? `<div class="space-y-2 max-h-48 overflow-y-auto">` + 
                            pelanggaran.map(p => `
                                <div class="flex items-center justify-between p-3 bg-rose-50 rounded-lg border border-rose-100 hover:bg-rose-100 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-rose-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-times text-rose-600 text-xs"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">${p.nama || 'Tidak ada nama'}</p>
                                            <p class="text-xs text-gray-500">${formatDate(p.tanggal)}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-rose-600 font-semibold flex-shrink-0">-${p.poin} poin</span>
                                        ${p.status === 'diterima' 
                                            ? '<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200"><i class="fas fa-check-circle text-xs"></i> Diterima</span>'
                                            : '<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-100 text-rose-700 border border-rose-200"><i class="fas fa-times-circle text-xs"></i> Ditolak</span>'
                                        }
                                    </div>
                                </div>
                            `).join('') + 
                            `</div>`
                        : '<div class="p-4 bg-gray-50 rounded-lg text-center text-gray-500 text-sm">Tidak ada pelanggaran</div>'
                    }
                </div>
    
                <!-- Prestasi Section -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-bold flex items-center gap-2 text-gray-800">
                            <i class="fas fa-trophy text-amber-500"></i>
                            Prestasi
                        </h4>
                        <span class="text-sm text-gray-500">${totalPrestasi} poin total</span>
                    </div>
                    ${
                        prestasi.length > 0
                        ? `<div class="space-y-2 max-h-48 overflow-y-auto">` + 
                            prestasi.map(p => `
                                <div class="flex items-center justify-between p-3 bg-emerald-50 rounded-lg border border-emerald-100 hover:bg-emerald-100 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-check text-emerald-600 text-xs"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">${p.nama || 'Tidak ada nama'}</p>
                                            <p class="text-xs text-gray-500">${formatDate(p.tanggal)}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-emerald-600 font-semibold flex-shrink-0">+${p.poin} poin</span>
                                        ${p.status === 'diterima' 
                                            ? '<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200"><i class="fas fa-check-circle text-xs"></i> Diterima</span>'
                                            : '<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-100 text-rose-700 border border-rose-200"><i class="fas fa-times-circle text-xs"></i> Ditolak</span>'
                                        }
                                    </div>
                                </div>
                            `).join('') + 
                            `</div>`
                        : '<div class="p-4 bg-gray-50 rounded-lg text-center text-gray-500 text-sm">Tidak ada prestasi</div>'
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
    
    // Fungsi helper untuk format tanggal
    function formatDate(dateString) {
        if (!dateString) return 'Tanggal tidak tersedia';
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    }
    
    // Tutup modal saat klik di luar
    document.getElementById('modalDetail').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Tutup modal dengan tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>

@endsection