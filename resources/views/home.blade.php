@extends('layouts.app')

@section('content')
    {{-- MAIN --}}
    <main class="main-content">
        <div class="page-inner">

            <div class="breadcrumb-custom">
                <a href="#">Informasi Calon Mitra</a>
                <span><i class="bi bi-chevron-right" style="font-size:11px;"></i></span>
                <span>Informasi Calon Mitra</span>
            </div>

            <h1 class="page-title">Informasi Calon Mitra</h1>

            {{-- Profile Card --}}
            <div class="profile-card">
                <div class="profile-card-avatar">
                    <img src="{{ $mitra->logo ?? '' }}" alt="Logo"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'bi bi-building\'></i>'">
                </div>
                <div class="profile-card-info">
                    <h2>{{ $mitra->nama ?? 'Zammarot Abdullah Nurjaman' }}</h2>
                    <div class="profile-card-meta">
                        <span>{{ $mitra->email ?? 'zammarotabdullah@gmail.com' }}</span>
                        <span class="sep">|</span>
                        <span>{{ $mitra->telepon ?? '082112556664' }}</span>
                        <span class="sep">|</span>
                        <span class="badge-verified">Terverifikasi</span>
                    </div>
                </div>
                <div class="profile-card-id">
                    <span>ID Mitra : {{ $mitra->id_mitra ?? 'DSUGYT' }}
                        <i class="bi bi-copy ms-1" style="cursor:pointer;font-size:13px;" title="Salin ID"></i>
                    </span>
                    <strong>{{ $mitra->nomor ?? '2306250037141' }}</strong>
                </div>
            </div>

            {{-- Info Alert --}}
            <div class="info-alert" id="infoAlert">
                <i class="bi bi-info-circle-fill alert-icon"></i>
                <div>
                    <strong>Terverifikasi</strong> = Mitra telah <strong>lulus proses verifikasi data legal</strong>
                    dan <strong>dapat mengajukan SPPG</strong>. Data legal yang telah diverifikasi
                    <strong>tidak dapat diubah</strong> oleh Mitra.
                </div>
                <button class="close-btn" onclick="document.getElementById('infoAlert').style.display='none'">
                    <i class="bi bi-x"></i>
                </button>
            </div>

            {{-- Tabs --}}
            <div class="nav-tabs-custom" role="tablist">
                <button class="nav-link active" onclick="switchTab(this,'umum')">Umum</button>
                <button class="nav-link" onclick="switchTab(this,'legal')">Legal</button>
                <button class="nav-link" onclick="switchTab(this,'keuangan')">Keuangan</button>
                <button class="nav-link" onclick="switchTab(this,'calon-sppg')">Calon SPPG <span
                        class="tab-badge">5</span></button>
                <button class="nav-link" onclick="switchTab(this,'calon-sppg-mitra')">Calon SPPG Mitra <span
                        class="tab-badge">0</span></button>
                <button class="nav-link" onclick="switchTab(this,'perwakilan')">Perwakilan Yayasan <span
                        class="tab-badge">3</span></button>
                <button class="nav-link" onclick="switchTab(this,'riwayat')">Riwayat Verifikasi Email <span
                        class="tab-badge">5</span></button>
            </div>

            {{-- Tab: Umum --}}
            <div id="tab-umum" class="tab-pane active">
                <div class="section-card">
                    <div class="section-title">
                        Informasi Akun <span class="required">*</span>
                        <span class="section-status"><i class="bi bi-clock"></i> Dalam Proses</span>
                    </div>
                    <div class="mb-4">
                        <div class="field-label">Logo Mitra</div>
                        <div class="logo-preview">
                            <img src="{{ $mitra->logo ?? '' }}" alt="Logo Mitra"
                                onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'bi bi-image\'></i>'">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="field-label">Nama Ketua/Direktur Utama<span class="required">*</span></div>
                            <div class="field-value"><i
                                    class="bi bi-person"></i><span>{{ $mitra->nama_ketua ?? 'Jajang Abdullah' }}</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="field-label">Email</div>
                            <div class="field-value"><i class="bi bi-envelope"></i><span
                                    class="text-truncate">{{ $mitra->email ?? 'zammarotabdullah@gmail.com' }}</span></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="field-label">Nomor Telepon</div>
                            <div class="field-value"><i
                                    class="bi bi-telephone"></i><span>{{ $mitra->telepon ?? '082112556664' }}</span></div>
                        </div>
                        <div class="col-12">
                            <div class="field-label">Nama Yayasan/Organisasi<span class="required">*</span></div>
                            <div class="field-value"><i
                                    class="bi bi-building"></i><span>{{ $mitra->nama_yayasan ?? '-' }}</span></div>
                        </div>
                        <div class="col-12">
                            <div class="field-label">Alamat Lengkap</div>
                            <div class="field-value"><i class="bi bi-geo-alt"></i><span>{{ $mitra->alamat ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tab-legal" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Dokumen Legal <span class="required">*</span></div>
                    <p class="text-muted" style="font-size:14px;">Informasi dokumen legal mitra akan ditampilkan di sini.
                    </p>
                </div>
            </div>

            <div id="tab-keuangan" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Informasi Keuangan <span class="required">*</span></div>
                    <p class="text-muted" style="font-size:14px;">Informasi keuangan mitra akan ditampilkan di sini.</p>
                </div>
            </div>

            <div id="tab-calon-sppg" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Calon SPPG</div>
                    <p class="text-muted" style="font-size:14px;">Daftar calon SPPG akan ditampilkan di sini.</p>
                </div>
            </div>

            <div id="tab-calon-sppg-mitra" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Calon SPPG Mitra</div>
                    <p class="text-muted" style="font-size:14px;">Belum ada data.</p>
                </div>
            </div>

            <div id="tab-perwakilan" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Perwakilan Yayasan</div>
                    <p class="text-muted" style="font-size:14px;">Daftar perwakilan yayasan akan ditampilkan di sini.</p>
                </div>
            </div>

            <div id="tab-riwayat" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Riwayat Verifikasi Email</div>
                    <p class="text-muted" style="font-size:14px;">Riwayat verifikasi email akan ditampilkan di sini.</p>
                </div>
            </div>

        </div>

        <footer class="page-footer">
            © {{ date('Y') }} Badan Gizi Nasional (BGN). All Rights Reserved.
        </footer>
    </main>

    <button class="scroll-top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Kembali ke atas">
        <i class="bi bi-arrow-up"></i>
    </button>

    <script>
        function switchTab(btn, tabId) {
            document.querySelectorAll('.nav-tabs-custom .nav-link').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            const pane = document.getElementById('tab-' + tabId);
            if (pane) pane.classList.add('active');
        }

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        function openSidebar() {
            sidebar.classList.add('open');
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        toggleBtn.addEventListener('click', () => sidebar.classList.contains('open') ? closeSidebar() : openSidebar());
        overlay.addEventListener('click', closeSidebar);
        sidebar.querySelectorAll('.nav-link').forEach(l => l.addEventListener('click', () => {
            if (window.innerWidth < 992) closeSidebar();
        }));
    </script>
@endsection
