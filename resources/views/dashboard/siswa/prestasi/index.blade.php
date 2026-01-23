@extends('dashboard.siswa.main')

@section('content')
<div class="container-fluid px-4 py-3">
    
    <!-- Header Section -->
    <div class="mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-box bg-gradient-primary">
                <i class="fas fa-trophy text-white"></i>
            </div>
            <div>
                <h4 class="mb-0 fw-bold text-gray-800">Prestasi Saya</h4>
                <p class="text-muted mb-0 small">Daftar prestasi yang telah diterima</p>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-semibold text-gray-700">
                    <i class="fas fa-list-ul me-2 text-primary"></i>
                    Daftar Prestasi
                </h6>
                <span class="badge bg-primary-subtle text-primary">
                    {{ $data->count() }} Prestasi
                </span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-center" style="width: 60px;">
                                <span class="text-muted small fw-semibold">No</span>
                            </th>
                            <th class="px-4 py-3 text-center" style="width: 100px;">
                                <span class="text-muted small fw-semibold">Foto</span>
                            </th>
                            <th class="px-4 py-3">
                                <span class="text-muted small fw-semibold">Prestasi</span>
                            </th>
                            <th class="px-4 py-3 text-center" style="width: 100px;">
                                <span class="text-muted small fw-semibold">Poin</span>
                            </th>
                            <th class="px-4 py-3">
                                <span class="text-muted small fw-semibold">Keterangan</span>
                            </th>
                            <th class="px-4 py-3 text-center" style="width: 120px;">
                                <span class="text-muted small fw-semibold">Tanggal</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $item)
                        <tr class="border-bottom">
                            <td class="px-4 py-3 text-center">
                                <span class="badge bg-light text-dark fw-normal">
                                    {{ $loop->iteration }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if($item->foto)
                                    <div class="image-wrapper">
                                        <img src="{{ asset('storage/'.$item->foto) }}"
                                             class="img-thumbnail rounded"
                                             alt="Foto Prestasi"
                                             style="width: 70px; height: 70px; object-fit: cover;">
                                    </div>
                                @else
                                    <div class="no-image">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="achievement-icon bg-primary-subtle text-primary">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <span class="fw-medium text-gray-800">
                                        {{ $item->jenis->nama }}
                                    </span>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <span class="badge bg-success-subtle text-success px-3 py-2 fw-semibold">
                                    <i class="fas fa-plus-circle me-1"></i>
                                    {{ $item->jenis->poin }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <span class="text-gray-600">
                                    {{ $item->keterangan ?? '-' }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="date-badge">
                                    <i class="fas fa-calendar-alt text-muted me-1"></i>
                                    <span class="text-gray-700">
                                        {{ $item->verified_at?->format('d/m/Y') ?? '-' }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-5 text-center">
                                <div class="empty-state">
                                    <div class="empty-icon mb-3">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <h6 class="text-muted mb-1">Belum Ada Prestasi</h6>
                                    <p class="text-muted small mb-0">
                                        Prestasi yang telah diverifikasi akan muncul di sini
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<style>
/* Icon Box */
.icon-box {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #6B21A8 0%, #7C3AED 100%);
    box-shadow: 0 4px 12px rgba(107, 33, 168, 0.2);
}

/* Card Styling */
.card {
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    padding: 1.25rem 1.5rem;
}

/* Table Styling */
.table {
    font-size: 0.9rem;
}

.table thead {
    border-bottom: 2px solid #E5E7EB;
}

.table tbody tr {
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: #F9FAFB;
}

.table tbody tr:last-child {
    border-bottom: none;
}

/* Achievement Icon */
.achievement-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

/* Image Wrapper */
.image-wrapper img {
    border: 2px solid #F3F4F6;
    transition: all 0.3s ease;
}

.image-wrapper img:hover {
    transform: scale(1.05);
    border-color: #6B21A8;
}

.no-image {
    width: 70px;
    height: 70px;
    background: #F3F4F6;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

/* Badge Styling */
.badge {
    font-weight: 500;
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
}

.bg-primary-subtle {
    background-color: #EDE9FE;
    color: #6B21A8;
}

.bg-success-subtle {
    background-color: #D1FAE5;
    color: #059669;
}

/* Date Badge */
.date-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    background: #F9FAFB;
    border-radius: 8px;
    font-size: 0.875rem;
}

/* Empty State */
.empty-state {
    padding: 2rem 0;
}

.empty-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #F3F4F6 0%, #E5E7EB 100%);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #9CA3AF;
}

/* Text Colors */
.text-gray-800 {
    color: #1F2937;
}

.text-gray-700 {
    color: #374151;
}

.text-gray-600 {
    color: #4B5563;
}

/* Responsive */
@media (max-width: 768px) {
    .table {
        font-size: 0.8rem;
    }
}
</style>
@endsection