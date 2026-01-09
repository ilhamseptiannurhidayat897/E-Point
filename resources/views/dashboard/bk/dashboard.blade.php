@extends('dashboard.bk.main')

@section('content')

<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-6 text-white shadow-lg mb-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold mb-2">Selamat Datang di Website Informasi E-Point Siswa</h2>
            <p class="text-purple-200">Kelola data siswa, kebaikan, dan pelanggaran dengan mudah</p>
        </div>
        <div class="hidden md:block">
            <div class="text-4xl font-bold">
                <span id="current-time"></span>
            </div>
            <div class="text-sm text-purple-200" id="current-date"></div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

    <div class="bg-white shadow rounded p-4">
        <p class="text-gray-500">Total Pelanggaran</p>
        <h2 class="text-3xl font-bold">{{ $totalPelanggaran }}</h2>
    </div>

    <div class="bg-yellow-100 shadow rounded p-4">
        <p class="text-gray-600">Pending</p>
        <h2 class="text-3xl font-bold">{{ $pending }}</h2>
    </div>

    <div class="bg-green-100 shadow rounded p-4">
        <p class="text-gray-600">Terverifikasi</p>
        <h2 class="text-3xl font-bold">{{ $verifikasi }}</h2>
    </div>

    <div class="bg-blue-100 shadow rounded p-4">
        <p class="text-gray-600">Total Siswa</p>
        <h2 class="text-3xl font-bold">{{ $totalSiswa }}</h2>
    </div>

</div>

<script>
    // Update current time
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
        const dateString = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        
        document.getElementById('current-time').textContent = timeString;
        document.getElementById('current-date').textContent = dateString;
    }
    
    updateTime();
    setInterval(updateTime, 1000);
</script>

@endsection
