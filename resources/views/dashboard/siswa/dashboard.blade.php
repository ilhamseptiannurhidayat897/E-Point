@extends('dashboard.siswa.sidebar')

@section('title','Dashboard E-Point')

@section('content')

<!-- INFO CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <!-- Total Poin -->
<h3 class="text-3xl font-bold text-primary">
    {{ $totalPoin }}
</h3>

<!-- Kebaikan -->
<h3 class="text-3xl font-bold text-green-600">
    {{ $totalKebaikan }}
</h3>

<!-- Pelanggaran -->
<h3 class="text-3xl font-bold text-red-600">
    {{ $totalPelanggaran }}
</h3>

</div>

<!-- CHART -->
<div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-bold text-primary mb-4">Grafik Poin Bulanan</h3>

    <div class="chart-container">
        <canvas id="monthlyChart"></canvas>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('monthlyChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                {
                    label: 'Pelanggaran',
                    data: [12, 19, 7, 15, 10, 18],
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderRadius: 6
                },
                {
                    label: 'Kebaikan',
                    data: [30, 25, 40, 35, 45, 50],
                    backgroundColor: 'rgba(16, 185, 129, 0.7)',
                    borderRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });
</script>
@endpush
