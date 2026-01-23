<!-- Modal Content Structure -->
<div class="detail-siswa-content">
    
    <!-- Info Siswa Section -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="info-card">
                <label class="info-label">
                    <i class="fas fa-user me-2"></i>Nama
                </label>
                <div class="info-value">Siswa Contoh</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <label class="info-label">
                    <i class="fas fa-id-card me-2"></i>NIS
                </label>
                <div class="info-value">3001</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <label class="info-label">
                    <i class="fas fa-graduation-cap me-2"></i>Kelas
                </label>
                <div class="info-value">X RPL 1</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-card">
                <label class="info-label">
                    <i class="fas fa-chalkboard-teacher me-2"></i>Wali Kelas
                </label>
                <div class="info-value">bzir</div>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <hr class="my-4">

    <!-- Pelanggaran Section -->
    <div class="mb-4">
        <div class="section-header">
            <div class="section-icon bg-danger-subtle">
                <i class="fas fa-exclamation-triangle text-danger"></i>
            </div>
            <h6 class="mb-0 fw-bold text-gray-800">Pelanggaran</h6>
        </div>
        
        <div class="timeline-list">
            <div class="timeline-item">
                <div class="timeline-marker bg-danger"></div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="mb-1 fw-semibold text-gray-800">Merokok</h6>
                            <span class="badge bg-danger-subtle text-danger">
                                <i class="fas fa-minus-circle me-1"></i>30 poin
                            </span>
                        </div>
                        <span class="text-muted small">
                            <i class="fas fa-calendar-alt me-1"></i>21 Jan 2026
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker bg-danger"></div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="mb-1 fw-semibold text-gray-800">Merokok</h6>
                            <span class="badge bg-danger-subtle text-danger">
                                <i class="fas fa-minus-circle me-1"></i>30 poin
                            </span>
                        </div>
                        <span class="text-muted small">
                            <i class="fas fa-calendar-alt me-1"></i>21 Jan 2026
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prestasi Section -->
    <div class="mb-3">
        <div class="section-header">
            <div class="section-icon bg-success-subtle">
                <i class="fas fa-trophy text-success"></i>
            </div>
            <h6 class="mb-0 fw-bold text-gray-800">Prestasi</h6>
        </div>
        
        <div class="timeline-list">
            <div class="timeline-item">
                <div class="timeline-marker bg-success"></div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="mb-1 fw-semibold text-gray-800">Juara 1 Lomba Akademik</h6>
                            <span class="badge bg-success-subtle text-success">
                                <i class="fas fa-plus-circle me-1"></i>50 poin
                            </span>
                        </div>
                        <span class="text-muted small">
                            <i class="fas fa-calendar-alt me-1"></i>21 Jan 2026
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker bg-success"></div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="mb-1 fw-semibold text-gray-800">Juara 2 Lomba Akademik</h6>
                            <span class="badge bg-success-subtle text-success">
                                <i class="fas fa-plus-circle me-1"></i>40 poin
                            </span>
                        </div>
                        <span class="text-muted small">
                            <i class="fas fa-calendar-alt me-1"></i>21 Jan 2026
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker bg-success"></div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="mb-1 fw-semibold text-gray-800">Juara 3 Lomba Akademik</h6>
                            <span class="badge bg-success-subtle text-success">
                                <i class="fas fa-plus-circle me-1"></i>30 poin
                            </span>
                        </div>
                        <span class="text-muted small">
                            <i class="fas fa-calendar-alt me-1"></i>21 Jan 2026
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
/* Info Card */
.info-card {
    background: #F9FAFB;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    padding: 1rem;
    transition: all 0.2s ease;
}

.info-card:hover {
    background: #F3F4F6;
    border-color: #D1D5DB;
}

.info-label {
    display: flex;
    align-items: center;
    font-size: 0.813rem;
    font-weight: 600;
    color: #6B7280;
    margin-bottom: 0.5rem;
}

.info-value {
    font-size: 1rem;
    font-weight: 600;
    color: #1F2937;
}

/* Section Header */
.section-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.25rem;
}

.section-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
}

.bg-danger-subtle {
    background: #FEE2E2;
}

.bg-success-subtle {
    background: #D1FAE5;
}

/* Timeline */
.timeline-list {
    position: relative;
    padding-left: 2rem;
}

.timeline-item {
    position: relative;
    padding-bottom: 1.5rem;
}

.timeline-item:last-child {
    padding-bottom: 0;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -1.5rem;
    top: 1.5rem;
    bottom: -0.5rem;
    width: 2px;
    background: #E5E7EB;
}

.timeline-marker {
    position: absolute;
    left: -1.75rem;
    top: 0.25rem;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.timeline-content {
    background: white;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    padding: 1rem;
    transition: all 0.2s ease;
}

.timeline-content:hover {
    border-color: #D1D5DB;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

/* Badge */
.badge {
    font-weight: 600;
    padding: 0.375rem 0.75rem;
    border-radius: 8px;
    font-size: 0.813rem;
}

.bg-danger-subtle.text-danger {
    background: #FEE2E2;
    color: #DC2626;
}

.bg-success-subtle.text-success {
    background: #D1FAE5;
    color: #059669;
}

/* Text Colors */
.text-gray-800 {
    color: #1F2937;
}

.text-gray-700 {
    color: #374151;
}

/* Divider */
hr {
    border-color: #E5E7EB;
    opacity: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .timeline-list {
        padding-left: 1.5rem;
    }
    
    .timeline-marker {
        left: -1.25rem;
    }
}
</style>