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
        <button class="topbar-hamburger" id="sidebarToggle" aria-label="Toggle menu">
            <i class="bi bi-list"></i>
        </button>
        <div class="topbar-brand">
            <img src="{{ asset('icon/BGN_LOGO.png') }}" alt="BGN" onerror="this.style.display='none'">

        </div>
        <div class="topbar-actions">
            <button class="topbar-icon-btn" title="Info"><i class="bi bi-info-circle"></i></button>
            <button class="topbar-icon-btn" title="Notifikasi">
                <i class="bi bi-bell"></i>
                <span class="badge-notif">17</span>
            </button>
            <button class="avatar-btn" title="Pengaturan"><i class="bi bi-gear-fill"></i></button>
        </div>
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
