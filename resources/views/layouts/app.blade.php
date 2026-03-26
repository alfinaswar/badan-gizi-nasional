<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <style>
        /* ─── BASE ─────────────────────────────────────── */
        html,
        body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9;
        }

        /* ─── TOPBAR ────────────────────────────────────── */
        .topbar {
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e5e9ef;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 300;
            display: flex;
            align-items: center;
            padding: 0 16px;
            gap: 8px;
        }

        .topbar-hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: #374151;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 6px;
            line-height: 1;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 220px;
            flex-shrink: 0;
        }

        .topbar-brand img {
            width: 134px;
            height: 34px;
            object-fit: contain;
        }

        .topbar-brand-text {
            font-size: 11px;
            font-weight: 700;
            line-height: 1.25;
            color: #1a2a4a;
            letter-spacing: 0.06em;
        }

        .topbar-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .topbar-icon-btn {
            position: relative;
            background: none;
            border: none;
            color: #4b5563;
            font-size: 20px;
            cursor: pointer;
            padding: 6px;
            border-radius: 50%;
            transition: background 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .topbar-icon-btn:hover {
            background: #f0f2f5;
        }

        .badge-notif {
            position: absolute;
            top: 2px;
            right: 2px;
            background: #ef4444;
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            border-radius: 10px;
            padding: 1px 4px;
            min-width: 16px;
            text-align: center;
            line-height: 1.4;
        }

        .avatar-btn {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #1a2a4a;
            color: #fff;
            border: none;
            font-size: 17px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.15s;
            flex-shrink: 0;
        }

        .avatar-btn:hover {
            opacity: 0.85;
        }

        /* ─── SIDEBAR OVERLAY ────────────────────────────── */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 250;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* ─── SIDEBAR ────────────────────────────────────── */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #e6e5e5;
            border-right: 1px solid #a0a7b1;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 260;
            padding-top: 68px;
            transition: transform 0.25s ease;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            font-size: 13.5px;
            font-weight: 500;
            color: #4b5563;
            border-radius: 0;
            transition: background 0.15s, color 0.15s;
            text-decoration: none;
        }

        .sidebar .nav-link:hover {
            background: #f0f4ff;
            color: #1a2a4a;
        }

        .sidebar .nav-link.active {
            background: #e8f0fe;
            color: #1a2a4a;
            font-weight: 600;
            border-left: 3px solid #1a2a4a;
        }

        .sidebar .nav-link i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        /* ─── MAIN CONTENT ───────────────────────────────── */
        .main-content {
            margin-left: 240px;
            padding-top: 60px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .page-inner {
            width: 100%;
            max-width: 100%;
            padding-right: 24px;
            padding-left: 24px;
            margin-right: auto;
            margin-left: auto;
            flex: 1;
        }

        /* ─── BREADCRUMB ─────────────────────────────────── */
        .breadcrumb-custom {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .breadcrumb-custom a {
            color: #9ca3af;
            text-decoration: none;
        }

        .breadcrumb-custom a:hover {
            color: #1a2a4a;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
        }

        /* ─── PROFILE CARD ───────────────────────────────── */
        .profile-card {
            background: #0f1f3d;
            border-radius: 12px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .profile-card-avatar {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
            background: #1e3a6e;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 26px;
            overflow: hidden;
        }

        .profile-card-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-card-info {
            flex: 1;
            min-width: 0;
        }

        .profile-card-info h2 {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-card-meta {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.75);
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .profile-card-meta .sep {
            opacity: 0.4;
        }

        .badge-verified {
            background: transparent;
            border: 1.5px solid #4ade80;
            color: #4ade80;
            font-size: 11.5px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
        }

        .profile-card-id {
            text-align: right;
            color: rgba(255, 255, 255, 0.75);
            font-size: 13px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .profile-card-id strong {
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            display: block;
        }

        /* ─── INFO ALERT ─────────────────────────────────── */
        .info-alert {
            background: #fff;
            border: 1.5px solid #bfdbfe;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13.5px;
            color: #374151;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .info-alert .alert-icon {
            color: #3b82f6;
            font-size: 18px;
            margin-top: 1px;
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
        }

        .info-alert .close-btn:hover {
            color: #374151;
        }

        /* ─── TABS ───────────────────────────────────────── */
        .nav-tabs-custom {
            border-bottom: 2px solid #e5e9ef;
            margin-bottom: 20px;
            display: flex;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .nav-tabs-custom::-webkit-scrollbar {
            display: none;
        }

        .nav-tabs-custom .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            margin-bottom: -2px;
            padding: 10px 16px;
            font-size: 13.5px;
            font-weight: 500;
            color: #6b7280;
            white-space: nowrap;
            cursor: pointer;
            background: none;
            transition: color 0.15s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-tabs-custom .nav-link:hover {
            color: #1a2a4a;
        }

        .nav-tabs-custom .nav-link.active {
            color: #1a2a4a;
            font-weight: 600;
            border-bottom-color: #1a2a4a;
        }

        .tab-badge {
            background: #1a2a4a;
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            border-radius: 10px;
            padding: 1px 6px;
            min-width: 18px;
            text-align: center;
        }

        /* ─── SECTION CARD ───────────────────────────────── */
        .section-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e5e9ef;
            padding: 24px 28px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .section-title .required {
            color: #ef4444;
        }

        .section-status {
            margin-left: auto;
            font-size: 13px;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
            white-space: nowrap;
        }

        /* ─── FORM FIELDS ────────────────────────────────── */
        .field-label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 5px;
        }

        .field-label .required {
            color: #ef4444;
        }

        .field-value {
            border: 1.5px solid #e5e9ef;
            border-radius: 8px;
            padding: 9px 13px;
            font-size: 14px;
            color: #111827;
            background: #fafafa;
            display: flex;
            align-items: center;
            gap: 9px;
            min-height: 42px;
        }

        .field-value i {
            color: #9ca3af;
            font-size: 15px;
        }

        .logo-preview {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid #e5e9ef;
            overflow: hidden;
            background: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #9ca3af;
        }

        .logo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ─── SCROLL TO TOP ──────────────────────────────── */
        .scroll-top-btn {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 46px;
            height: 46px;
            background: #1a2a4a;
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 19px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(26, 42, 74, 0.3);
            transition: background 0.15s, transform 0.15s;
            z-index: 400;
        }

        .scroll-top-btn:hover {
            background: #0f1f3d;
            transform: translateY(-2px);
        }

        /* ─── FOOTER ─────────────────────────────────────── */
        .page-footer {
            text-align: right;
            padding: 14px 32px;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e5e9ef;
            background: #fff;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        /* ═══════════════════════════════════════════════════
               RESPONSIVE
            ═══════════════════════════════════════════════════ */

        /* Tablet ≤ 991px */
        @media (max-width: 991px) {
            .topbar-hamburger {
                display: flex;
            }

            .topbar-brand {
                width: auto;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .page-inner {
                padding: 20px;
            }

            .page-footer {
                padding: 14px 20px;
                text-align: center;
            }

            .profile-card-id {
                width: 100%;
                text-align: left;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 10px;
                margin-top: 4px;
            }
        }

        /* Mobile ≤ 575px */
        @media (max-width: 575px) {
            .page-inner {
                padding: 14px;
            }

            .page-title {
                font-size: 20px;
                margin-bottom: 14px;
            }

            .profile-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 16px;
                gap: 10px;
            }

            .profile-card-info h2 {
                font-size: 16px;
                white-space: normal;
            }

            .profile-card-id {
                width: 100%;
                text-align: left;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 10px;
            }

            .section-card {
                padding: 16px;
            }

            .section-title {
                font-size: 15px;
            }

            .section-status {
                margin-left: 0;
                width: 100%;
                margin-top: 4px;
            }

            .info-alert {
                font-size: 12.5px;
            }

            .nav-tabs-custom .nav-link {
                padding: 9px 12px;
                font-size: 13px;
            }

            .scroll-top-btn {
                bottom: 16px;
                right: 16px;
                width: 40px;
                height: 40px;
                font-size: 17px;
            }
        }
    </style>

    {{-- TOPBAR --}}
    <nav class="topbar">


        <!-- Notifikasi Modal -->
        <div id="notifModal" class="modal" tabindex="-1"
            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(34,34,34,0.22); overflow-y:auto;">
            <div class="modal-dialog"
                style="max-width:420px; margin:48px auto; background:#fff; border-radius:14px; box-shadow:0 6px 24px rgba(45,60,90,0.13); padding:0; min-height:100px; display:flex; flex-direction:column; max-height:calc(100vh - 96px);">
                <div class="modal-header"
                    style="padding:18px 22px 12px 22px; border-bottom:1px solid #ececec; flex-shrink:0;">
                    <span style="font-weight:700; font-size:18px; color:#232127; flex:1;">Notifikasi</span>
                </div>
                <div class="modal-body" style="overflow-y:auto; padding:14px 18px 0 18px; flex:1; min-height:0;">
                    <!-- Notif 1 -->
                    <div
                        style="background:#fff; border-radius:8px; padding:14px 15px 8px 15px; margin-bottom:13px; border:1px solid #e4e4e7;">
                        <div style="font-weight:700; font-size:15px; color:#232127;">Pengajuan Ditolak</div>
                        <div style="font-size:13.2px; color:#424457; margin-top:2px;">
                            Pengajuan telah ditolak oleh JUNFIRIO CHEISAR BERLIANTO.
                        </div>
                        <div style="font-size:12.2px; color:#a5a6ab; margin-top:6px;">4 bulan yang lalu</div>
                    </div>
                    <!-- Notif 2 -->
                    <div
                        style="background:#fff; border-radius:8px; padding:14px 15px 8px 15px; margin-bottom:13px; border:1px solid #e4e4e7;">
                        <div style="font-weight:700; font-size:15px; color:#232127;">Penunjukan KA SPPG</div>
                        <div style="font-size:13.2px; color:#424457; margin-top:2px;">
                            Pengajuan SPPG KAB. BOGOR - BOJONG GEDE telah dilakukan penunjukan KA SPPG oleh Zammarot
                            Abdullah Nurjaman.
                        </div>
                        <div style="font-size:12.2px; color:#a5a6ab; margin-top:6px;">5 bulan yang lalu</div>
                    </div>
                    <!-- Notif 3 -->
                    <div
                        style="background:#fff; border-radius:8px; padding:14px 15px 8px 15px; margin-bottom:13px; border:1px solid #e4e4e7;">
                        <div style="font-weight:700; font-size:15px; color:#232127;">Penentuan Kelayakan</div>
                        <div style="font-size:13.2px; color:#424457; margin-top:2px;">
                            Selamat, survei lapangan telah selesai dilakukan, dan saat ini Calon Lokasi SPPG yang Anda
                            ajukan memasuki tahap Penentuan Kelayakan
                        </div>
                        <div style="font-size:12.2px; color:#a5a6ab; margin-top:6px;">5 bulan yang lalu</div>
                    </div>
                </div>
                <div class="modal-footer"
                    style="padding:16px 22px 18px 22px; border-top:1px solid #ececec; background:transparent; display:flex; justify-content:center; flex-shrink:0;">
                    <button type="button" onclick="closeNotifModal()"
                        style="
                        background: #e0be82;
                        color: #fff;
                        border: none;
                        border-radius: 8px;
                        padding: 10px 0;
                        font-weight: 700;
                        font-size: 15px;
                        width: 100%;
                        margin-top: 2px;
                        box-shadow: none;
                        cursor: pointer;
                        letter-spacing:0.01em;
                        transition: background 0.18s;
                    ">Tutup</button>
                </div>
            </div>
        </div>
        <script>
            function openNotifModal() {
                document.getElementById('notifModal').style.display = 'block';
                document.body.style.overflow = 'hidden';
            }

            function closeNotifModal() {
                document.getElementById('notifModal').style.display = 'none';
                document.body.style.overflow = '';
            }
            // Tutup modal bila klik area luar modal-dialog
            document.addEventListener('mousedown', function(e) {
                var modal = document.getElementById('notifModal');
                var dialog = modal && modal.querySelector('.modal-dialog');
                if (modal && dialog && modal.style.display !== 'none') {
                    if (!dialog.contains(e.target)) closeNotifModal();
                }
            });
            // Tutup modal dengan tombol Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === "Escape") closeNotifModal();
            });
        </script>

        <div class="topbar-brand">
            <img src="{{ asset('icon/BGN_LOGO.png') }}" alt="BGN" onerror="this.style.display='none'">

        </div>
        <div class="topbar-actions">
            <button class="topbar-icon-btn" title="Notifikasi" id="openNotifModal" onclick="openNotifModal()">
                <i class="bi bi-info-circle"></i>
                <span class="badge-notif">3</span>
            </button>
            <div class="notif-dropdown-wrapper" style="position:relative;">
                <button class="topbar-icon-btn" id="notifDropdownBtn" title="Notifikasi"
                    onclick="toggleNotifDropdown(event)">
                    <i class="bi bi-bell"></i>
                    <span class="badge-notif">3</span>
                </button>
                <div id="notifDropdown" class="notif-dropdown-menu"
                    style="display:none; position:absolute; right:0; top:42px; width:360px; max-width:94vw; background:#fff; box-shadow:0 4px 24px rgba(60,72,88,.13); border-radius:12px; z-index:2000;">
                    <div style="max-height:350px; overflow-y:auto; padding:0 0;">
                        <div
                            style="padding:16px 20px 12px 18px; border-bottom:1px solid #f1f1f5; display:flex; align-items:center;">
                            <span style="font-weight:700; font-size:16px; color:#1a2a4a; flex:1;">Notifikasi</span>
                            <button onclick="closeNotifDropdown(event)"
                                style="background:transparent; border:none; font-size:15px; color:#aaa; cursor:pointer;"
                                aria-label="Tutup">&times;</button>
                        </div>

                        <!-- NOTIF ITEM 1 -->
                        <div
                            style="display:flex; padding:16px 20px 12px 18px; border-bottom:1px solid #f5f5f5; align-items:flex-start; gap:8px;">
                            <span style="margin-top:3.5px; color:#1773ea;"><i class="bi bi-info-circle"></i></span>
                            <div style="flex:1;">
                                <div style="font-weight:800; font-size:15px; color:#232127;">Pengajuan Verifikasi Data
                                    Mitra</div>
                                <div style="font-size:13px; color:#899;">8 bulan yang lalu</div>
                                <div style="font-size:14px; color:#363a49; margin-top:2px;">
                                    Kami menerima pengajuan verifikasi data mitra dari Anda. Tim kami akan melakukan
                                    verifikasi data mitra yang Anda ajukan.
                                </div>
                            </div>
                            <button onclick="removeNotif(this)"
                                style="margin-left:8px; background:transparent; border:none; font-size:16px; color:#b6b6bd; cursor:pointer; padding:0;"
                                title="Hapus notifikasi" aria-label="Tutup">&times;</button>
                        </div>
                        <!-- NOTIF ITEM 2 (DUPLICATE) -->
                        <div
                            style="display:flex; padding:16px 20px 12px 18px; border-bottom:1px solid #f5f5f5; align-items:flex-start; gap:8px;">
                            <span style="margin-top:3.5px; color:#1773ea;"><i class="bi bi-info-circle"></i></span>
                            <div style="flex:1;">
                                <div style="font-weight:800; font-size:15px; color:#232127;">Pengajuan Verifikasi Data
                                    Mitra</div>
                                <div style="font-size:13px; color:#899;">8 bulan yang lalu</div>
                                <div style="font-size:14px; color:#363a49; margin-top:2px;">
                                    Kami menerima pengajuan verifikasi data mitra dari Anda. Tim kami akan melakukan
                                    verifikasi data mitra yang Anda ajukan.
                                </div>
                            </div>
                            <button onclick="removeNotif(this)"
                                style="margin-left:8px; background:transparent; border:none; font-size:16px; color:#b6b6bd; cursor:pointer; padding:0;"
                                title="Hapus notifikasi" aria-label="Tutup">&times;</button>
                        </div>
                        <div
                            style="display:flex; padding:16px 20px 12px 18px; border-bottom:1px solid #f5f5f5; align-items:flex-start; gap:8px;">
                            <span style="margin-top:3.5px; color:#1773ea;"><i class="bi bi-info-circle"></i></span>
                            <div style="flex:1;">
                                <div style="font-weight:800; font-size:15px; color:#232127;">Verifikasi Persiapan</div>
                                <div style="font-size:13px; color:#899;">1 bulan yang lalu</div>
                                <div style="font-size:14px; color:#363a49; margin-top:2px;">
                                    Pengajuan SPPG KAB. BOGOR - BOJONG GEDE<br>
                                    telah memasuki tahap Verifikasi Persiapan.
                                </div>
                            </div>
                            <button onclick="removeNotif(this)"
                                style="margin-left:8px; background:transparent; border:none; font-size:16px; color:#b6b6bd; cursor:pointer; padding:0;"
                                title="Hapus notifikasi" aria-label="Tutup">&times;</button>
                        </div>
                        <!-- END NOTIF ITEM -->
                        <!-- Tambah notifikasi lain di sini jika perlu -->
                    </div>
                </div>
            </div>
            <div class="dropdown" style="position: relative;">
                <button class="avatar-btn" id="profileDropdownBtn" onclick="toggleProfileDropdown(event)"
                    title="Pengaturan" style="border:none; background:transparent; padding:0;">
                    <img src="{{ asset('icon/BGN_LOGO.png') }}" alt="Profile"
                        style="width:38px; border-radius:50%; border:2px solid #63d39e; background:white;">
                </button>
                <div id="profileDropdown"
                    style="display:none; z-index:1500; position:absolute; right:0; top:120%; min-width:212px; background:#fff; border-radius:14px; box-shadow:0 3px 32px rgba(0,0,0,0.10); padding:0; overflow:hidden;">
                    <a href="{{ route('profile') }}"
                        style="padding:18px 20px 10px 20px; border-bottom:1px solid #f3f4f8; display:flex;align-items:center;gap:10px; text-decoration:none; color:inherit;">
                        <i class="bi bi-person" style="font-size: 20px;color:#616067"></i>
                        <span style="font-weight:500;">Profil</span>
                    </a>
                    <button type="button"
                        style="width:100%; padding:0; border:none; background:none; text-align:left; margin:0; cursor:not-allowed; color:#1a2a4a; font-weight:600; font-size:15px; display:flex; gap:10px; align-items:center; padding:13px 20px 13px 20px; opacity:.72;">
                        <i class="bi bi-book" style="font-size:18px;"></i>
                        <span>Buku Panduan</span>
                    </button>
                    <button type="button"
                        style="width:100%; padding:0; border:none; background:none; text-align:left; margin:0; cursor:not-allowed; color:#ed3636; font-weight:600; font-size:15px; display:flex; gap:10px; align-items:center; padding:13px 20px 13px 20px;">
                        <i class="bi bi-lock" style="font-size:18px;"></i>
                        <span>Pengaturan 2FA</span>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit"
                            style="width:100%; padding:0; border:none; background:none; text-align:left; margin:0; color:#353558; font-weight:500; font-size:15px; display:flex; gap:10px; align-items:center; padding:13px 20px 13px 20px;">
                            <i class="bi bi-box-arrow-left" style="font-size:18px;"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
                <script>
                    function toggleProfileDropdown(event) {
                        event.stopPropagation();
                        let dropdown = document.getElementById('profileDropdown');
                        if (dropdown.style.display === "none" || !dropdown.style.display) {
                            dropdown.style.display = "block";
                            setTimeout(function() {
                                document.addEventListener('click', clickAwayProfileDropdown);
                            }, 10);
                        } else {
                            dropdown.style.display = "none";
                            document.removeEventListener('click', clickAwayProfileDropdown);
                        }
                    }

                    function clickAwayProfileDropdown(e) {
                        let dropdown = document.getElementById('profileDropdown');
                        let btn = document.getElementById('profileDropdownBtn');
                        if (!dropdown.contains(e.target) && e.target !== btn) {
                            dropdown.style.display = "none";
                            document.removeEventListener('click', clickAwayProfileDropdown);
                        }
                    }
                </script>
            </div>
        </div>
        <script>
            function toggleNotifDropdown(event) {
                event.stopPropagation();
                let dropdown = document.getElementById('notifDropdown');
                if (dropdown.style.display === "none" || !dropdown.style.display) {
                    dropdown.style.display = "block";
                    setTimeout(function() {
                        document.addEventListener('click', clickAwayNotifDropdown);
                    }, 10);
                } else {
                    dropdown.style.display = "none";
                    document.removeEventListener('click', clickAwayNotifDropdown);
                }
            }

            function clickAwayNotifDropdown(e) {
                let dropdown = document.getElementById('notifDropdown');
                let btn = document.getElementById('notifDropdownBtn');
                if (!dropdown.contains(e.target) && e.target !== btn) {
                    dropdown.style.display = "none";
                    document.removeEventListener('click', clickAwayNotifDropdown);
                }
            }

            function closeNotifDropdown(event) {
                event.stopPropagation();
                let dropdown = document.getElementById('notifDropdown');
                dropdown.style.display = 'none';
                document.removeEventListener('click', clickAwayNotifDropdown);
            }

            function removeNotif(btn) {
                var notifItem = btn.closest("div[style^='display:flex']");
                if (notifItem) notifItem.style.display = "none";
            }
        </script>
    </nav>

    {{-- OVERLAY --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
        <nav>
            <a href="#" class="nav-link active"><i class="bi bi-building"></i> Informasi Calon Mitra</a>
            <a href="{{ route('otp.pl') }}" class="nav-link"><i class="bi bi-geo-alt"></i> Pengajuan Lokasi SPPG</a>
            <a href="{{ route('otp.mitra') }}" class="nav-link"><i class="bi bi-link-45deg"></i> SPPG Mitra
                Non-Yayasan</a>
        </nav>
    </aside>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
    </div>
</body>

</html>
