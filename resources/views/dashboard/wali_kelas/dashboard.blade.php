@extends('dashboard.wali_kelas.main')

@section('content')

<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-6 text-white shadow-lg mb-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold mb-2">
                Selamat Datang di Website Informasi E-Point Siswa
            </h2>
            <p class="text-purple-200">
                Kelola data siswa, kebaikan, dan pelanggaran dengan mudah
            </p>
        </div>
        <div class="hidden md:block">
            <div class="text-4xl font-bold">
                <span id="current-time"></span>
            </div>
            <div class="text-sm text-purple-200" id="current-date"></div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-2xl font-bold text-primary mt-1">
            {{ $totalSiswa ?? 0 }}
        </h2>
    </div>

    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Pelanggaran</p>
        <h2 class="text-2xl font-bold text-red-600 mt-1">
            {{ $totalPelanggaran ?? 0 }}
        </h2>
    </div>

    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Prestasi</p>
        <h2 class="text-2xl font-bold text-green-600 mt-1">
            {{ $totalPrestasi ?? 0 }}
        </h2>
    </div>

    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Total Poin Kelas</p>
        <h2 class="text-2xl font-bold text-purple-700 mt-1">
            {{ $totalPoin ?? 0 }}
        </h2>
    </div>

</div>

<script>
function updateTime() {
    const now = new Date();
    document.getElementById('current-time').textContent =
        now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    document.getElementById('current-date').textContent =
        now.toLocaleDateString('id-ID', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });
}
updateTime();
setInterval(updateTime, 1000);
</script>

@endsection
