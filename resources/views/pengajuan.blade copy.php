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
                    <h2>{{ $sppg->nama ?? 'SPPG CANDI RETNO, PAGELARAN' }}</h2>
                    <div class="sppg-info-meta">
                        <div class="sppg-id">
                            ID SPPG : {{ $sppg->id_sppg ?? 'E2BLHXXA' }}
                            <i class="bi bi-copy" title="Salin ID" onclick="copyId()"></i>
                        </div>
                        <span class="sppg-sep">•</span>
                        <span>Yayasan Terkait : {{ Str::limit($sppg->yayasan ?? 'Yayasan Permata E...', 25) }}</span>
                    </div>
                </div>
                <a href="" class="btn-process">Proses Persiapan</a>
            </div>
        </div>
    </main>
    {{-- Leaflet JS --}}
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
@endsection
