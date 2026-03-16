@extends('layouts.app')

@section('content')
    {{-- Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6f9;
        }

        /* ── Breadcrumb ── */
        .breadcrumb-custom {
            font-size: 13px;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }

        .breadcrumb-custom a {
            color: #9ca3af;
            text-decoration: none;
        }

        .breadcrumb-custom a:hover {
            color: #1a2a4a;
        }

        /* ── Page Header ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            color: #111827;
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-qr {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            background: #0f1f3d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, transform 0.12s;
            white-space: nowrap;
        }

        .btn-qr:hover {
            background: #1a3060;
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-map {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            background: #0f1f3d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, transform 0.12s;
            white-space: nowrap;
        }

        .btn-map:hover {
            background: #1a3060;
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-withdraw {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: #dc2626;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, transform 0.12s;
            white-space: nowrap;
        }

        .btn-withdraw:hover {
            background: #b91c1c;
            color: #fff;
            transform: translateY(-1px);
        }

        /* ── Info Strip ── */
        .info-strip {
            display: flex;
            align-items: center;
            gap: 0;
            flex-wrap: wrap;
            font-size: 13.5px;
            color: #374151;
            padding: 12px 0;
            border-top: 1px solid #e5e9ef;
            border-bottom: 1px solid #e5e9ef;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 10px;
            padding: 12px 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 6px;
            padding-right: 16px;
            margin-right: 16px;
            border-right: 1px solid #e5e9ef;
        }

        .info-item:last-child {
            border-right: none;
            padding-right: 0;
            margin-right: 0;
        }

        .info-item i {
            color: #6b7280;
            font-size: 15px;
        }

        .info-item strong {
            color: #111827;
            font-weight: 700;
        }

        /* ── Map Container ── */
        .map-wrapper {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e9ef;
            margin-bottom: 0;
        }

        #map {
            width: 100%;
            height: 380px;
        }

        /* ── Map Legend ── */
        .map-legend {
            position: absolute;
            bottom: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 12px;
            color: #374151;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
            z-index: 1000;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .legend-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── SPPG Info Card (below map) ── */
        .sppg-info-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-top: none;
            border-radius: 0 0 12px 12px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .sppg-info-left h2 {
            font-size: 17px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .sppg-info-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #6b7280;
            flex-wrap: wrap;
        }

        .sppg-id {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            color: #374151;
        }

        .sppg-id i {
            font-size: 13px;
            cursor: pointer;
            color: #9ca3af;
        }

        .sppg-id i:hover {
            color: #1a2a4a;
        }

        .sppg-sep {
            color: #d1d5db;
        }

        .btn-process {
            padding: 10px 22px;
            background: #fff;
            color: #0f1f3d;
            border: 1.5px solid #0f1f3d;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            white-space: nowrap;
            transition: background 0.15s, color 0.15s, transform 0.12s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-process:hover {
            background: #0f1f3d;
            color: #fff;
            transform: translateY(-1px);
        }

        /* Custom Leaflet popup */
        .leaflet-popup-content-wrapper {
            border-radius: 10px !important;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15) !important;
            padding: 0 !important;
        }

        .leaflet-popup-content {
            margin: 0 !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }

        .custom-popup {
            padding: 12px 16px;
            font-size: 13.5px;
            font-weight: 600;
            color: #111827;
            white-space: nowrap;
        }

        .leaflet-popup-tip-container {
            display: none;
        }

        /* Custom marker */
        .marker-sppg {
            background: #0f1f3d;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
        }

        /* ── Responsive ── */
        @media (max-width: 767px) {
            .page-title {
                font-size: 19px;
            }

            .header-actions {
                width: 100%;
            }

            .btn-qr,
            .btn-map,
            .btn-withdraw {
                flex: 1;
                justify-content: center;
            }

            #map {
                height: 280px;
            }

            .info-strip {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .info-item {
                border-right: none;
                padding-right: 0;
                margin-right: 0;
            }

            .map-legend {
                flex-direction: column;
                gap: 6px;
                bottom: 8px;
                right: 8px;
            }
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6f9;
        }

        /* ── Profile Card ── */
        .profile-card {
            background: #0f1f3d;
            border-radius: 14px;
            padding: 22px 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 16px;
            position: relative;
            flex-wrap: wrap;
        }

        .profile-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
            overflow: hidden;
            background: #1e3a6e;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 26px;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-body {
            flex: 1;
            min-width: 0;
        }

        .profile-name {
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .profile-name .verified-icon {
            color: #60a5fa;
            font-size: 20px;
            flex-shrink: 0;
        }

        .profile-meta {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.72);
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .profile-meta .sep {
            opacity: 0.4;
        }

        .profile-meta .mid-id {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }

        .profile-meta .mid-id i {
            font-size: 13px;
            cursor: pointer;
        }

        .profile-meta .mid-id i:hover {
            color: #fff;
        }

        .profile-ext-btn {
            position: absolute;
            top: 20px;
            right: 24px;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            font-size: 20px;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            transition: color 0.15s, background 0.15s;
        }

        .profile-ext-btn:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        /* ── Info Alert ── */
        .info-alert {
            background: #fff;
            border: 1.5px solid #bfdbfe;
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 13.5px;
            color: #374151;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
            line-height: 1.65;
        }

        .info-alert i.alert-icon {
            color: #3b82f6;
            font-size: 17px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .info-alert .close-btn {
            margin-left: auto;
            background: none;
            border: none;
            color: #9ca3af;
            font-size: 18px;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            flex-shrink: 0;
            align-self: center;
        }

        .info-alert .close-btn:hover {
            color: #374151;
        }

        /* ── Tab Card ── */
        .tab-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 12px;
            overflow: hidden;
        }

        /* ── Tabs ── */
        .nav-tabs-custom {
            display: flex;
            border-bottom: 1px solid #e5e9ef;
            padding: 0 4px;
            overflow-x: auto;
            scrollbar-width: none;
            gap: 0;
        }

        .nav-tabs-custom::-webkit-scrollbar {
            display: none;
        }

        .nav-tabs-custom .nav-link {
            border: none;
            border-bottom: 2.5px solid transparent;
            margin-bottom: -1px;
            padding: 14px 18px;
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
            white-space: nowrap;
            cursor: pointer;
            background: none;
            transition: color 0.15s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .nav-tabs-custom .nav-link:hover {
            color: #1a2a4a;
        }

        .nav-tabs-custom .nav-link.active {
            color: #111827;
            font-weight: 600;
            border-bottom-color: #1a2a4a;
        }

        /* ── Tab Pane ── */
        .tab-pane {
            display: none;
            padding: 28px 28px;
        }

        .tab-pane.active {
            display: block;
        }

        /* ── Field Grid ── */
        .field-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px 24px;
        }

        .field-item {}

        .field-label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }

        .field-value {
            font-size: 14px;
            color: #111827;
            font-weight: 400;
            line-height: 1.5;
        }

        .field-value.empty {
            color: #9ca3af;
            font-style: italic;
        }

        /* ── Responsive ── */
        @media (max-width: 767px) {
            .profile-card {
                padding: 18px 18px;
                gap: 14px;
            }

            .profile-name {
                font-size: 16px;
            }

            .tab-pane {
                padding: 20px 16px;
            }

            .field-grid {
                grid-template-columns: 1fr 1fr;
                gap: 20px 16px;
            }

            .profile-ext-btn {
                top: 14px;
                right: 14px;
            }

            .info-alert {
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .field-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .nav-tabs-custom .nav-link {
                padding: 12px 14px;
                font-size: 13px;
            }

            .profile-meta {
                font-size: 12px;
            }
        }
    </style>
    <main class="main-content">
        <div class="page-inner">
            {{-- Breadcrumb --}}
            <div class="breadcrumb-custom">
                <a href="#">Pengajuan Lokasi SPPG</a>
                <i class="bi bi-chevron-right" style="font-size:11px;"></i>
                <span>Pengajuan Informasi Lokasi SPPG</span>
            </div>

            {{-- Page Header --}}
            <div class="page-header">
                <h1 class="page-title">Pengajuan Informasi Lokasi SPPG</h1>
                <div class="header-actions">
                    <button class="btn-qr" onclick="showQR()">
                        <i class="bi bi-qr-code"></i> QR Code Identitas SPPG
                    </button>
                    <button class="btn-map" onclick="openMap()">
                        <i class="bi bi-play-circle"></i> Lihat di Peta
                    </button>
                    <button class="btn-withdraw" onclick="confirmWithdraw()">
                        Mengundurkan Diri
                    </button>
                </div>
            </div>

            {{-- Info Strip --}}
            <div class="info-strip">
                <div class="info-item">
                    <i class="bi bi-file-text"></i>
                    <span>Komitmen Kesiapan: <strong>{{ $sppg->komitmen ?? '-' }}</strong></span>
                </div>
                <div class="info-item">
                    <i class="bi bi-calendar3"></i>
                    <span>Tanggal Operasional: <strong>{{ $sppg->tanggal_operasional ?? '-' }}</strong></span>
                </div>
                <div class="info-item">
                    <i class="bi bi-clock"></i>
                    <span>Terakhir diperbarui: <strong>{{ $sppg->terakhir_diperbarui ?? '10 hari' }}</strong></span>
                </div>
            </div>

            {{-- Map + SPPG Card --}}
            <div class="map-wrapper">
                <div id="map"></div>

                {{-- Legend --}}
                <div class="map-legend">
                    <div class="legend-item">
                        <div class="legend-dot" style="background:#0f1f3d;"></div>
                        Lokasi Calon SPPG
                    </div>
                    <div class="legend-item">
                        <div class="legend-dot" style="background:#f59e0b;"></div>
                        Lokasi Data Kelompok
                    </div>
                    <div class="legend-item">
                        <div class="legend-dot" style="background:#3b82f6;"></div>
                        Titik Rekomendasi
                    </div>
                </div>
            </div>

            {{-- SPPG Info Card --}}
            <div class="sppg-info-card">
                <div class="sppg-info-left">
                    <h2>{{ $sppg->nama ?? 'SPPG BOJONG GEDE' }}</h2>
                    <div class="sppg-info-meta">
                        <div class="sppg-id">
                            ID SPPG : {{ $sppg->id_sppg ?? 'B2GCL2GS' }}
                            <i class="bi bi-copy" title="Salin ID" onclick="copyId()"></i>
                        </div>
                        <span class="sppg-sep">•</span>
                        <span>YAYASAN TERKAIT :
                            {{ Str::upper(Str::limit($sppg->yayasan ?? 'yayasan pondok pesantren manba Hidayatul maarif')) }}</span>
                    </div>
                </div>
                <a href="" class="btn-process">Proses Persiapan</a>
            </div>
            <br>
            <div class="profile-card">
                <div class="profile-avatar">
                    <img src="{{ $yayasan->logo ?? '' }}" alt="Logo"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'bi bi-building\'></i>'">
                </div>
                <div class="profile-body">
                    <div class="profile-name">
                        {{ $yayasan->nama ?? 'Yayasan Permata Emas Empat Lima' }}
                        <i class="bi bi-patch-check-fill verified-icon"></i>
                    </div>
                    <div class="profile-meta">
                        <div class="mid-id">
                            ID Mitra : {{ $yayasan->id_mitra ?? '8DOZFW' }}
                            <i class="bi bi-copy" title="Salin ID"
                                onclick="copyToClipboard('{{ $yayasan->id_mitra ?? '8DOZFW' }}', this)"></i>
                        </div>
                        <span class="sep">•</span>
                        <span>NPWP: {{ $yayasan->npwp ?? '1000000002936139' }}</span>
                        <span class="sep">•</span>
                        <span>Nomor Ponsel: {{ $yayasan->nomor_ponsel ?? '081293825578' }}</span>
                        <span class="sep">•</span>
                        <span>Email: {{ $yayasan->email ?? 'permataemasempatlima@gmail.com' }}</span>
                    </div>
                </div>
                <button class="profile-ext-btn" title="Buka di tab baru">
                    <i class="bi bi-box-arrow-up-right"></i>
                </button>
            </div>

            {{-- Info Alert --}}
            <div class="info-alert" id="infoAlert">
                <i class="bi bi-info-circle-fill alert-icon"></i>
                <div>
                    <strong>Proses Persiapan = Calon mitra</strong> melakukan pelaporan kesiapan secara berkala dan
                    melengkapi
                    seluruh bukti hingga progress bar mencapai 100%. Jika kesiapan dirasa sudah terpenuhi,
                    <strong>mitra dapat mengakhiri proses persiapan</strong> untuk <strong>melanjutkan ke tahap
                        berikutnya</strong>.
                </div>
                <button class="close-btn" onclick="document.getElementById('infoAlert').style.display='none'">
                    <i class="bi bi-x"></i>
                </button>
            </div>

            {{-- Tab Card --}}
            <div class="tab-card">

                {{-- Tabs --}}
                <div class="nav-tabs-custom" role="tablist">
                    <button class="nav-link active" onclick="switchTab(this, 'yayasan')">Yayasan</button>
                    <button class="nav-link" onclick="switchTab(this, 'perwakilan')">Perwakilan Yayasan</button>
                    <button class="nav-link" onclick="switchTab(this, 'petugas')">Petugas Survey</button>
                    <button class="nav-link" onclick="switchTab(this, 'kepala')">Kepala SPPG</button>
                </div>

                {{-- Tab: Yayasan --}}
                <div id="tab-yayasan" class="tab-pane active">
                    <div class="field-grid">

                        <div class="field-item">
                            <div class="field-label">Nama yayasan</div>
                            <div class="field-value">{{ $yayasan->nama ?? 'Yayasan Permata Emas Empat Lima' }}</div>
                        </div>

                        <div class="field-item">
                            <div class="field-label">Nama ketua yayasan</div>
                            <div class="field-value">{{ $yayasan->nama_ketua ?? 'M.Diaz Darmawan' }}</div>
                        </div>

                        <div class="field-item">
                            <div class="field-label">NPWP Yayasan</div>
                            <div class="field-value">{{ $yayasan->npwp ?? '1000000002936139' }}</div>
                        </div>

                        <div class="field-item">
                            <div class="field-label">Email</div>
                            <div class="field-value">{{ $yayasan->email ?? 'permataemasempatlima@gmail.com' }}</div>
                        </div>

                        <div class="field-item">
                            <div class="field-label">Nomor Ponsel</div>
                            <div class="field-value">{{ $yayasan->nomor_ponsel ?? '081293825578' }}</div>
                        </div>

                        <div class="field-item">
                            <div class="field-label">Alamat Yayasan</div>
                            <div class="field-value">{{ $yayasan->alamat ?? 'jalan nusantara gang perkutut no 3' }}</div>
                        </div>

                        <div class="field-item">
                            <div class="field-label">Kode Pos Yayasan</div>
                            <div class="field-value">{{ $yayasan->kode_pos ?? '35141' }}</div>
                        </div>

                    </div>
                </div>

                {{-- Tab: Perwakilan Yayasan --}}
                <div id="tab-perwakilan" class="tab-pane">
                    <div class="field-grid">
                        @forelse ($yayasan->perwakilan ?? [] as $item)
                            <div class="field-item">
                                <div class="field-label">Nama Perwakilan</div>
                                <div class="field-value">{{ $item->nama }}</div>
                            </div>
                            <div class="field-item">
                                <div class="field-label">Jabatan</div>
                                <div class="field-value">{{ $item->jabatan }}</div>
                            </div>
                            <div class="field-item">
                                <div class="field-label">Nomor Ponsel</div>
                                <div class="field-value">{{ $item->nomor_ponsel }}</div>
                            </div>
                        @empty
                            <div class="field-item" style="grid-column:1/-1;">
                                <div class="field-value empty">Belum ada data perwakilan yayasan.</div>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Tab: Petugas Survey --}}
                <div id="tab-petugas" class="tab-pane">
                    <div class="field-grid">
                        @forelse ($yayasan->petugas ?? [] as $item)
                            <div class="field-item">
                                <div class="field-label">Nama Petugas</div>
                                <div class="field-value">{{ $item->nama }}</div>
                            </div>
                            <div class="field-item">
                                <div class="field-label">NIK</div>
                                <div class="field-value">{{ $item->nik }}</div>
                            </div>
                            <div class="field-item">
                                <div class="field-label">Nomor Ponsel</div>
                                <div class="field-value">{{ $item->nomor_ponsel }}</div>
                            </div>
                        @empty
                            <div class="field-item" style="grid-column:1/-1;">
                                <div class="field-value empty">Belum ada data petugas survey.</div>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Tab: Kepala SPPG --}}
                <div id="tab-kepala" class="tab-pane">
                    <div class="field-grid">
                        @forelse ($yayasan->kepala ?? [] as $item)
                            <div class="field-item">
                                <div class="field-label">Nama Kepala</div>
                                <div class="field-value">{{ $item->nama }}</div>
                            </div>
                            <div class="field-item">
                                <div class="field-label">NIK</div>
                                <div class="field-value">{{ $item->nik }}</div>
                            </div>
                            <div class="field-item">
                                <div class="field-label">Nomor Ponsel</div>
                                <div class="field-value">{{ $item->nomor_ponsel }}</div>
                            </div>
                        @empty
                            <div class="field-item" style="grid-column:1/-1;">
                                <div class="field-value empty">Belum ada data kepala SPPG.</div>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
            <div class="section-card" style="margin: 32px 0;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <div>
                        <div style="font-size:18px;font-weight:700;margin-bottom:2px;">Alamat SPPG</div>
                        <div style="font-size:13px;color:#8492a6;">Alamat lengkap calon SPPG.</div>
                    </div>
                    <button type="button" class="btn btn-primary"
                        style="background: #0f1f3d; border-radius: 7px; font-size:14px; font-weight:600; padding:7px 24px; border:none;">
                        <i class="bi bi-pencil" style="margin-right:6px;"></i>Revisi
                    </button>
                </div>
                <form>
                    <div style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:12px;">
                        <div style="flex:1; min-width:180px;">
                            <label style="font-size:13px;font-weight:500;margin-bottom:5px;display:block;">Provinsi</label>
                            <select class="form-select" disabled style="background:#f9fafb;">
                                <option>{{ $sppg->provinsi ?? 'LAMPUNG' }}</option>
                            </select>
                        </div>
                        <div style="flex:1; min-width:180px;">
                            <label style="font-size:13px;font-weight:500;margin-bottom:5px;display:block;">Kota</label>
                            <select class="form-select" disabled style="background:#f9fafb;">
                                <option>{{ $sppg->kota ?? 'KAB. PRINGSEWU' }}</option>
                            </select>
                        </div>
                        <div style="flex:1; min-width:180px;">
                            <label
                                style="font-size:13px;font-weight:500;margin-bottom:5px;display:block;">Kecamatan</label>
                            <select class="form-select" disabled style="background:#f9fafb;">
                                <option>{{ $sppg->kecamatan ?? 'PAGELARAN' }}</option>
                            </select>
                        </div>
                        <div style="flex:1; min-width:180px;">
                            <label
                                style="font-size:13px;font-weight:500;margin-bottom:5px;display:block;">Desa/Kelurahan</label>
                            <select class="form-select" disabled style="background:#f9fafb;">
                                <option>{{ $sppg->desa ?? 'CANDI RETNO' }}</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom:12px;">
                        <label style="font-size:13px;font-weight:500;margin-bottom:5px;display:block;">Kode Pos</label>
                        <input type="text" class="form-control" value="{{ $sppg->kode_pos ?? '' }}" disabled
                            style="background:#f9fafb;">
                    </div>
                    <div>
                        <label style="font-size:13px;font-weight:500;margin-bottom:5px;display:block;">Alamat</label>
                        <textarea class="form-control" rows="2" disabled style="background:#f9fafb;">{{ $sppg->alamat ?? 'Jalan Merdeka, RT 3 RW 2, Ganjaran, Kecamatan Pagelaran, Kabupaten Pringsewu' }}</textarea>
                    </div>
                </form>
            </div>

        </div>

    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // ── Koordinat (ganti sesuai data dari controller) ──
        const lat = {{ $sppg->lat ?? -6.449024199999999 }};
        const lng = {{ $sppg->lng ?? 106.7806612 }};
        const namaLokasi = "{{ $sppg->nama ?? 'SPPG CANDI RETNO, PAGELARAN' }}";

        // ── Init Map ──
        const map = L.map('map', {
            center: [lat, lng],
            zoom: 20,
            zoomControl: true,
        });

        // ── Tile Layer (OpenStreetMap) ──
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
        }).addTo(map);

        // ── Custom marker icon ──
        const markerIcon = L.divIcon({
            className: '',
            html: `<div style="
            background:#0f1f3d;
            width:36px; height:36px;
            border-radius:50%;
            border:3px solid #fff;
            box-shadow:0 2px 10px rgba(0,0,0,0.35);
            display:flex; align-items:center; justify-content:center;
            color:#fff; font-size:15px;
        "><i class="bi bi-building-fill"></i></div>`,
            iconSize: [36, 36],
            iconAnchor: [18, 18],
            popupAnchor: [0, -22],
        });

        // ── Marker ──
        const marker = L.marker([lat, lng], {
            icon: markerIcon
        }).addTo(map);

        marker.bindPopup(`
        <div class="custom-popup">Titik Pengajuan Mitra</div>
    `, {
            closeButton: true,
            maxWidth: 200,
            minWidth: 160,
        }).openPopup();

        // ── Button: Lihat di Peta ──
        function openMap() {
            map.setView([lat, lng], 14);
            marker.openPopup();
        }

        // ── Copy ID ──
        function copyId() {
            const id = "{{ $sppg->id_sppg ?? 'E2BLHXXA' }}";
            navigator.clipboard.writeText(id).then(() => {
                const icon = document.querySelector('.sppg-id .bi-copy');
                if (icon) {
                    icon.classList.replace('bi-copy', 'bi-check2');
                    setTimeout(() => icon.classList.replace('bi-check2', 'bi-copy'), 1500);
                }
            });
        }

        // ── QR Code (placeholder) ──
        function showQR() {
            alert('QR Code untuk SPPG ID: {{ $sppg->id_sppg ?? 'E2BLHXXA' }}');
        }

        // ── Withdraw confirmation ──
        function confirmWithdraw() {
            if (confirm('Apakah Anda yakin ingin mengundurkan diri dari pengajuan ini?')) {
                window.location.href = "";
            }
        }
    </script>
    <script>
        function switchTab(btn, tabId) {
            document.querySelectorAll('.nav-tabs-custom .nav-link').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            const pane = document.getElementById('tab-' + tabId);
            if (pane) pane.classList.add('active');
        }

        function copyToClipboard(text, icon) {
            navigator.clipboard.writeText(text).then(() => {
                icon.classList.replace('bi-copy', 'bi-check2');
                setTimeout(() => icon.classList.replace('bi-check2', 'bi-copy'), 1500);
            });
        }
    </script>
@endsection
