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
            background: #0f1f3d;
            color: #fff;
            border: 1.5px solid #0f1f3d;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            white-space: nowrap;
            text-decoration: none;
            display: inline-block;
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6f9;
        }

        /* ── Step Nav ── */
        .step-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 10px;
            padding: 6px 10px;
            width: fit-content;
            margin: 0 auto 24px auto;
            flex-wrap: wrap;
            gap: 2px;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 7px;
            font-size: 13.5px;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            white-space: nowrap;
            transition: background 0.15s, color 0.15s;
            text-decoration: none;
        }

        .step-item:hover {
            background: #f3f4f6;
            color: #374151;
        }

        .step-item.active {
            background: #f3f4f6;
            color: #111827;
            font-weight: 600;
        }

        .step-item i {
            font-size: 15px;
        }

        /* check = green, warning = orange */
        .step-item .icon-check {
            color: #22c55e;
        }

        .step-item .icon-warn {
            color: #f59e0b;
        }

        .step-item .icon-active {
            color: #111827;
        }

        /* ── Main Card ── */
        .section-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 12px;
            padding: 24px 28px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 24px;
        }

        /* ── Progress Bar ── */
        .progress-wrap {
            margin-bottom: 14px;
        }

        .progress-bar-outer {
            width: 100%;
            background: #374151;
            border-radius: 50px;
            height: 44px;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .progress-bar-inner {
            height: 100%;
            background: #22c55e;
            border-radius: 50px;
            transition: width 0.6s ease;
            min-width: 0;
        }

        .progress-bar-label {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            letter-spacing: 0.01em;
        }

        .progress-hint {
            font-size: 13px;
            color: #6b7280;
            line-height: 1.6;
            margin-top: 12px;
        }

        .progress-hint strong {
            color: #111827;
            font-weight: 700;
        }

        /* ── Petugas Card ── */
        .petugas-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 10px;
            padding: 16px 20px 14px;
            margin-top: 24px;
        }

        .petugas-grid {
            display: grid;
            grid-template-columns: 2fr 2fr 2fr 1.5fr;
            gap: 12px 20px;
            margin-bottom: 12px;
        }

        .petugas-label {
            font-size: 12.5px;
            font-weight: 500;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .petugas-value {
            font-size: 14px;
            color: #111827;
            font-weight: 500;
        }

        .status-badge-orange {
            font-size: 13px;
            font-weight: 600;
            color: #f59e0b;
        }

        .petugas-note {
            font-size: 12.5px;
            color: #6b7280;
            margin-top: 4px;
        }

        .petugas-note strong {
            color: #374151;
        }

        /* ── Rekening Card ── */
        .rekening-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .rekening-header {
            padding: 14px 20px;
        }

        .rekening-title {
            display: inline-block;
            background: #f3f4f6;
            color: #374151;
            font-size: 13.5px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 7px;
        }

        .rekening-body {
            padding: 20px 28px 24px;
            border-top: 1px solid #f0f2f5;
        }

        .field-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .field-label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 5px;
        }

        .field-value {
            font-size: 14px;
            color: #111827;
        }

        /* ── Responsive ── */
        @media (max-width: 767px) {
            .step-nav {
                width: 100%;
                justify-content: flex-start;
                overflow-x: auto;
                flex-wrap: nowrap;
            }

            .petugas-grid {
                grid-template-columns: 1fr 1fr;
            }

            .field-grid-3 {
                grid-template-columns: 1fr 1fr;
            }

            .section-card {
                padding: 18px 16px;
            }

            .rekening-body {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .petugas-grid {
                grid-template-columns: 1fr;
            }

            .field-grid-3 {
                grid-template-columns: 1fr;
            }

            .step-item {
                font-size: 12.5px;
                padding: 6px 10px;
            }
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6f9;
        }

        /* ── Reused base ── */
        .section-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 12px;
            padding: 24px 28px;
            margin-bottom: 16px;
        }

        /* ── Outer wrapper card ── */
        .outer-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 14px;
            overflow: hidden;
        }

        /* ── Top tab bar ── */
        .tab-bar {
            display: flex;
            border-bottom: 1px solid #e5e9ef;
            padding: 0 6px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .tab-bar::-webkit-scrollbar {
            display: none;
        }

        .tab-bar .tab-btn {
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
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: color .15s;
        }

        .tab-bar .tab-btn:hover {
            color: #1a2a4a;
        }

        .tab-bar .tab-btn.active {
            color: #111827;
            font-weight: 700;
            border-bottom-color: #111827;
        }

        /* ── Inner content area ── */
        .tab-content {
            padding: 28px 28px;
        }

        /* ── Section header row ── */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
        }

        .section-heading {
            font-size: 17px;
            font-weight: 800;
            color: #111827;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .badge-green {
            font-size: 12px;
            font-weight: 600;
            color: #16a34a;
            background: #dcfce7;
            border-radius: 20px;
            padding: 3px 12px;
            white-space: nowrap;
        }

        .btn-primary-dark {
            display: inline-flex;
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
            transition: background .15s, transform .12s;
        }

        .btn-primary-dark:hover {
            background: #1a3060;
            color: #fff;
            transform: translateY(-1px);
        }

        /* ── Foto block ── */
        .foto-block {
            margin-bottom: 20px;
        }

        .foto-block-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
        }

        .foto-container {
            width: 100%;
            background: #111;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* image sits in the center, natural width, letterboxed by black bg */
        .foto-container img {
            height: 100%;
            width: auto;
            max-width: 100%;
            display: block;
            object-fit: contain;
        }

        /* File label overlay top-left — always on top of black area */
        .foto-file-label {
            position: absolute;
            top: 14px;
            left: 14px;
            color: #fff;
            font-size: 12.5px;
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            gap: 1px;
            z-index: 2;
        }

        .foto-file-label .file-name {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-size: 13px;
        }

        .foto-file-label .file-size {
            font-size: 11.5px;
            opacity: .75;
            padding-left: 2px;
        }

        .foto-file-label i {
            font-size: 14px;
        }

        .foto-caption {
            font-size: 12.5px;
            color: #9ca3af;
            margin-top: 7px;
        }

        /* ── Radio option card ── */
        .radio-section {
            border: 1px solid #e5e9ef;
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 14px;
        }

        .radio-section-label {
            font-size: 13.5px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 16px;
        }

        .radio-options-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 32px;
        }

        .radio-opt {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: pointer;
        }

        .radio-opt input[type="radio"] {
            width: 17px;
            height: 17px;
            accent-color: #0f1f3d;
            cursor: pointer;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .radio-opt-body {}

        .radio-opt-title {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 3px;
        }

        .radio-opt-desc {
            font-size: 12.5px;
            color: #6b7280;
            line-height: 1.5;
        }

        /* Tab pane visibility */
        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        /* ── Responsive ── */
        @media (max-width: 600px) {
            .tab-content {
                padding: 18px 16px;
            }

            .radio-options-row {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-primary-dark {
                width: 100%;
                justify-content: center;
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
                    <h2>{{ $sppg->nama ?? 'SPPG BOJONG GEDE, RAGAJAYA #001' }}</h2>
                    <div class="sppg-info-meta">
                        <div class="sppg-id">
                            ID SPPG : {{ $sppg->id_sppg ?? 'B2GCL2GS' }}
                            <i class="bi bi-copy" title="Salin ID" onclick="copyId()"></i>
                        </div>
                        <span class="sppg-sep">•</span>
                        <span>yayasan terkait :
                            {{ Str::lower(Str::limit($sppg->yayasan ?? 'yayasan pondok pesantren manba hidayatul maarif')) }}</span>
                    </div>
                </div>
                <a href="" class="btn-process">Proses Persiapan</a>
            </div>
            <br>
            {{-- Profile Card --}}
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
                            ID Mitra : {{ $yayasan->id_mitra ?? 'B2GCL2GS' }}
                            <i class="bi bi-copy" title="Salin ID"
                                onclick="copyToClipboard('{{ $yayasan->id_mitra ?? 'B2GCL2GS' }}', this)"></i>
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
                    {{-- Fields --}}
                    <div class="field-grid field-grid-4">
                        <div class="field-item">
                            <div class="field-label">Nama Perwakilan Yayasan</div>
                            <div class="field-value">{{ $yayasan->perwakilan->nama ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">NIK Perwakilan Yayasan</div>
                            <div class="field-value">{{ $yayasan->perwakilan->nik ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Email Perwakilan Yayasan</div>
                            <div class="field-value">{{ $yayasan->perwakilan->email ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Nomor Ponsel Perwakilan Yayasan</div>
                            <div class="field-value">{{ $yayasan->perwakilan->nomor_ponsel ?? '-' }}</div>
                        </div>
                    </div>

                    {{-- Ubah Perwakilan button --}}
                    <div style="padding: 0 0 4px 0;">
                        <a href="#" class="btn-ubah-full">
                            <i class="bi bi-pencil"></i> Ubah Perwakilan
                        </a>
                    </div>
                </div>

                {{-- Tab: Petugas Survey --}}
                <div id="tab-petugas" class="tab-pane">
                    <div class="field-grid field-grid-4">
                        <div class="field-item">
                            <div class="field-label">Nama</div>
                            <div class="field-value">{{ $yayasan->petugas->nama ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Nomor Ponsel</div>
                            <div class="field-value">{{ $yayasan->petugas->nomor_ponsel ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Tempat Lahir</div>
                            <div class="field-value">{{ $yayasan->petugas->tempat_lahir ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Tanggal Lahir</div>
                            <div class="field-value">{{ $yayasan->petugas->tanggal_lahir ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Pendidikan Terakhir</div>
                            <div class="field-value">{{ $yayasan->petugas->pendidikan_terakhir ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Tab: Kepala SPPG --}}
                <div id="tab-kepala" class="tab-pane">
                    <div class="field-grid field-grid-4">
                        <div class="field-item">
                            <div class="field-label">Nama</div>
                            <div class="field-value">{{ $yayasan->kepala->nama ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Nomor Ponsel</div>
                            <div class="field-value">{{ $yayasan->kepala->nomor_ponsel ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Tempat Lahir</div>
                            <div class="field-value">{{ $yayasan->kepala->tempat_lahir ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Tanggal Lahir</div>
                            <div class="field-value">{{ $yayasan->kepala->tanggal_lahir ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Pendidikan Terakhir</div>
                            <div class="field-value">{{ $yayasan->kepala->pendidikan_terakhir ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Nomor Surat Tugas</div>
                            <div class="field-value">{{ $yayasan->kepala->nomor_surat_tugas ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">Tanggal Surat Tugas</div>
                            <div class="field-value">{{ $yayasan->kepala->tanggal_surat_tugas ?? '-' }}</div>
                        </div>
                        <div class="field-item">
                            <div class="field-label">No Urut Surat Tugas</div>
                            <div class="field-value">{{ $yayasan->kepala->no_urut_surat_tugas ?? '-' }}</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── Rekening SPPG (Virtual Account) ── --}}
            <div class="rekening-card">
                <div class="rekening-header">
                    <span class="rekening-title">Rekening SPPG (Virtual Account)</span>
                </div>
                <div class="rekening-body">
                    <div class="field-grid-3">
                        <div>
                            <div class="field-label">Nama Bank</div>
                            <div class="field-value">{{ $sppg->rekening->nama_bank ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="field-label">Nomor VA</div>
                            <div class="field-value">{{ $sppg->rekening->nomor_va ?? '-' }}</div>
                        </div>
                        <div>
                            <div class="field-label">Atas Nama</div>
                            <div class="field-value">{{ $sppg->rekening->atas_nama ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── Step Navigation ── --}}
            <div class="step-nav">
                <a href="#" class="step-item">
                    <i class="bi bi-person-circle"></i>
                    Informasi Mitra
                    <i class="bi bi-check icon-check"></i>
                </a>
                <a href="#" class="step-item">
                    <i class="bi bi-geo-alt"></i>
                    Informasi Pengajuan
                    <i class="bi bi-check icon-check"></i>
                </a>
                <a href="#" class="step-item active">
                    <i class="bi bi-building icon-active"></i>
                    Kesiapan Lokasi Calon SPPG
                    <i class="bi bi-exclamation-circle icon-warn"></i>
                </a>
                <a href="#" class="step-item">
                    <i class="bi bi-folder2"></i>
                    Dokumen Pendukung
                    <i class="bi bi-exclamation-circle icon-warn"></i>
                </a>
            </div>

            {{-- ── Progress Kesiapan SPPG Card ── --}}
            <div class="section-card">
                <div class="section-title">Progress Kesiapan SPPG</div>

                {{-- Progress Bar --}}
                <div class="progress-wrap">
                    @php $persen = $sppg->progress_kesiapan ?? 0; @endphp
                    <div class="progress-bar-outer">
                        <div class="progress-bar-inner" style="width: {{ $persen }}%;"></div>
                        <span class="progress-bar-label">{{ $persen }}% Kesiapan SPPG</span>
                    </div>
                </div>

                <p class="progress-hint">
                    Harap lengkapi seluruh evidence yang dibutuhkan untuk kesiapan calon SPPG sebelum melewati
                    tanggal komitmen yang telah Anda sepakati, yaitu
                    <strong>{{ $sppg->tanggal_komitmen ?? '13 April 2026' }}</strong>
                </p>

                {{-- Petugas Survei Card --}}
                <div class="petugas-card">
                    <div class="petugas-grid">
                        <div>
                            <div class="petugas-label">Nama Petugas Survei</div>
                            <div class="petugas-value">{{ $sppg->petugas->nama ?? 'YAHYA MAULANA ANDIKA, S.Pd' }}</div>
                        </div>
                        <div>
                            <div class="petugas-label">Email Petugas Survei</div>
                            <div class="petugas-value">{{ $sppg->petugas->email ?? 'yahyamaulana882@gmail.com' }}</div>
                        </div>
                        <div>
                            <div class="petugas-label">Nomor Telepon Petugas Survei</div>
                            <div class="petugas-value">{{ $sppg->petugas->nomor_telepon ?? '082281633215' }}</div>
                        </div>
                        <div>
                            <div class="petugas-label">Status</div>
                            <div class="status-badge-orange">
                                {{ $sppg->petugas->status ?? 'Proses Survei Proses Persiapan' }}
                            </div>
                        </div>
                    </div>
                    <div class="petugas-note">
                        *Petugas ditunjuk pada: <strong>{{ $sppg->petugas->tanggal_ditunjuk ?? '05 Maret 2026' }}</strong>
                    </div>
                </div>
            </div>
            <div class="section-card" style="margin-top: 32px;">
                {{-- Tab for Hasil Survei Proses Persiapan / Ada Pembangunan --}}
                <div style="display: flex; gap: 18px; align-items: center; margin-bottom: 18px;">
                    <div>
                        <button class="btn btn-outline-secondary active"
                            style="font-weight:600; font-size:13px; border-radius: 6px; padding:6px 18px; margin-right:4px; background: #f3f4f6; border: none;">
                            Hasil Survei Proses Persiapan
                        </button>
                        <button class="btn btn-outline-secondary"
                            style="font-weight:600; font-size:13px; border-radius: 6px; padding:6px 18px; background: #fff; border: none;">
                            Ada Pembangunan
                        </button>
                    </div>
                    <button class="btn btn-dark"
                        style="margin-left:auto; padding:7px 18px; font-size:14px; border-radius:7px;" type="button">
                        <i class="bi bi-clock-history" style="margin-right:5px;"></i>Lihat Riwayat Survei
                    </button>
                </div>

                <div style="margin-bottom:18px;">
                    <div style="font-weight:600; font-size:15px; margin-bottom:6px;">Foto Tampak Depan Calon SPPG</div>
                    <div style="background:#23262f; padding:10px; border-radius:7px;">
                        <div style="display: flex; align-items: flex-start; gap: 12px;">
                            <div style="font-size:12px; color: #fff; margin-right: 14px;">
                                <i class="bi bi-image"></i>
                                DOK706W9TRFYSGDNMK7ZLAMNY.jpg
                            </div>
                            <img src="/path/to/sample/photo.jpg" alt="Tampak Depan SPPG"
                                style="max-height:220px; max-width:128px; object-fit:cover; border-radius:7px; background:#eee;">
                        </div>
                        <div style="color:#fff; margin-top:3px; font-size:13px;">* Foto tampak depan calon SPPG secara
                            keseluruhan</div>
                    </div>
                </div>

                <div class="radio-section">
                    <div class="radio-section-label">Kondisi Pembangunan Lokasi</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="kondisi_pembangunan" value="ada_pembangunan"
                                {{ ($survei->kondisi_pembangunan ?? '') === 'ada_pembangunan' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada Pembangunan</div>
                                <div class="radio-opt-desc">Terdapat aktivitas pembangunan pada lokasi.</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="kondisi_pembangunan" value="lahan_kosong"
                                {{ ($survei->kondisi_pembangunan ?? '') === 'lahan_kosong' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Lahan Kosong</div>
                                <div class="radio-opt-desc">Belum terdapat aktivitas pembangunan pada lokasi.</div>
                            </div>
                        </label>
                    </div>
                </div>
                {{-- 2. Perkembangan Peralatan Dapur --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Peralatan Dapur</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="peralatan_dapur" value="ada"
                                {{ ($survei->peralatan_dapur ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Peralatan Dapur</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="peralatan_dapur" value="tidak_ada"
                                {{ ($survei->peralatan_dapur ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Peralatan Dapur</div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 3. Perkembangan Peralatan Masak --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Peralatan Masak</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="peralatan_masak" value="ada"
                                {{ ($survei->peralatan_masak ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan peralatan Masak</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="peralatan_masak" value="tidak_ada"
                                {{ ($survei->peralatan_masak ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan peralatan Masak</div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 4. Perkembangan Alat K3 --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Alat K3</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="alat_k3" value="ada"
                                {{ ($survei->alat_k3 ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Alat K3</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="alat_k3" value="tidak_ada"
                                {{ ($survei->alat_k3 ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Alat K3</div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 5. Perkembangan Instalasi Listrik --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Instalasi Listrik</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="instalasi_listrik" value="ada"
                                {{ ($survei->instalasi_listrik ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Instalasi Listrik</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="instalasi_listrik" value="tidak_ada"
                                {{ ($survei->instalasi_listrik ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Instalasi Listrik
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 6. Perkembangan Alternatif Listrik --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Alternatif Listrik</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="alternatif_listrik" value="ada"
                                {{ ($survei->alternatif_listrik ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Alternatif Listrik
                                </div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="alternatif_listrik" value="tidak_ada"
                                {{ ($survei->alternatif_listrik ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Alternatif Listrik
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 7. Perkembangan Instalasi Air --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Instalasi Air</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="instalasi_air" value="ada"
                                {{ ($survei->instalasi_air ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Instalasi Air</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="instalasi_air" value="tidak_ada"
                                {{ ($survei->instalasi_air ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Instalasi Air</div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 8. Perkembangan Kendaraan Distribusi --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Kendaraan Distribusi Makanan</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="kendaraan_distribusi" value="ada"
                                {{ ($survei->kendaraan_distribusi ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Kendaraan Distribusi
                                </div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="kendaraan_distribusi" value="tidak_ada"
                                {{ ($survei->kendaraan_distribusi ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Kendaraan Distribusi
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 9. Perkembangan Instalasi Gas --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Instalasi Gas</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="instalasi_gas" value="ada"
                                {{ ($survei->instalasi_gas ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Instalasi Gas</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="instalasi_gas" value="tidak_ada"
                                {{ ($survei->instalasi_gas ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Instalasi Gas</div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 10. Perkembangan Pemasok Bahan Baku --}}
                <div class="radio-section">
                    <div class="radio-section-label">Perkembangan Persiapan Pemasok Bahan Baku</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="pemasok_bahan_baku" value="ada"
                                {{ ($survei->pemasok_bahan_baku ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Pemasok Bahan Baku
                                </div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="pemasok_bahan_baku" value="tidak_ada"
                                {{ ($survei->pemasok_bahan_baku ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Pemasok Bahan Baku
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- 11. Perkembangan Pekerja Lokal --}}
                <div class="radio-section" style="margin-bottom:0;">
                    <div class="radio-section-label">Perkembangan Persiapan Pekerja Lokal</div>
                    <div class="radio-options-row">
                        <label class="radio-opt">
                            <input type="radio" name="pekerja_lokal" value="ada"
                                {{ ($survei->pekerja_lokal ?? '') === 'ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Ada</div>
                                <div class="radio-opt-desc">Terdapat perkembangan persiapan Pekerja Lokal</div>
                            </div>
                        </label>
                        <label class="radio-opt">
                            <input type="radio" name="pekerja_lokal" value="tidak_ada"
                                {{ ($survei->pekerja_lokal ?? 'tidak_ada') === 'tidak_ada' ? 'checked' : '' }}>
                            <div class="radio-opt-body">
                                <div class="radio-opt-title">Tidak Ada</div>
                                <div class="radio-opt-desc">Tidak ada perkembangan persiapan Pekerja Lokal</div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="section-card" style="margin-bottom: 20px;">
                    <div style="font-size: 14px; font-weight: 500; margin-bottom: 8px;">
                        Perkembangan Lokasi Dapur :
                        <span style="color: #e11d48; font-weight:700;">TIDAK ADA PERKEMBANGAN</span>
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px;">Kesimpulan
                            Hasil Survey</label>
                        <textarea class="form-control" rows="2" readonly
                            style="width:100%; font-size:13px; background:#f9fafb; border: 1px solid #e5e7eb;">Survei sementara hanya untuk survei persiapan pembangunan</textarea>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 4px;">Video Kondisi
                            Calon SPPG Saat Ini</label>
                        <div style="background: #181818; border-radius: 6px; overflow:hidden; border:1px solid #e5e7eb;">
                            <div
                                style="font-size: 12px; color: #8492a6; background: #f9fafb; padding: 7px 12px; border-bottom:1px solid #e5e7eb;">
                                <i class="bi bi-file-earmark-play" style="margin-right:6px;"></i>
                                DOK/VID/SY2023/SB/V/PSW/SAMBO/007.mp4
                            </div>
                            <video controls style="width:100%;height:auto;max-height:320px;display:block;background:#000;">
                                <source src="/storage/dok/vid/sy2023/sb/v/psw/sambo/007.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                <div class="section-card" style="padding:22px 24px 6px 24px; margin-bottom:28px;">
                    <button
                        style="width:100%;background:#0f1f3d;color:#fff;font-weight:600;border:none;border-radius:6px;padding:11px 0;margin-bottom:14px;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:10px;font-size:14px;">
                        <i class="bi bi-pencil"></i> Lengkapi Pengajuan
                    </button>
                    <button
                        style="width:100%;background:#0f1f3d;color:#fff;font-weight:600;border:none;border-radius:6px;padding:11px 0;margin-bottom:14px;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:10px;font-size:14px;">
                        <i class="bi bi-plus-lg"></i> Tambah Aktivitas
                    </button>
                    <button
                        style="width:100%;background:#f3f4f6;color:#9ca3af;font-weight:500;border:none;border-radius:6px;padding:11px 0;margin-bottom:0;cursor:not-allowed;display:flex;align-items:center;justify-content:center;gap:10px;font-size:13px;">
                        <i class="bi bi-clock"></i> Aktif Persiapan
                    </button>
                </div>

                <div class="section-card" style="padding:18px 20px;">
                    <div style="font-size:15px;font-weight:600;margin-bottom:16px;">Aktivitas</div>
                    <div style="overflow-x:auto;">
                        <table style="width:100%;border-collapse:collapse;font-size:13px;min-width:680px;">
                            <thead>
                                <tr style="background:#f4f6f9;">
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                        Pelapor</th>
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                        Tanggal Aktivitas</th>
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                        Gambar</th>
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                        Judul Aktivitas</th>
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                        Catatan Aktivitas</th>
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                        Category</th>
                                    <th
                                        style="padding:10px 10px;font-weight:600;border-bottom:1px solid #e5e7eb;text-align:left;">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid #e5e7eb;">
                                    <td style="padding:10px 10px;color:#222;">Sony</td>
                                    <td style="padding:10px 10px;">27 February 2024</td>
                                    <td style="padding:10px 10px;">
                                        <!-- Kosong pada gambar -->
                                    </td>
                                    <td style="padding:10px 10px;">Verifikasi Pengajuan</td>
                                    <td style="padding:10px 10px;">Silakan melanjutkan proses pada tahap selanjutnya sesuai
                                        dengan standar yang ditetapkan oleh SBN.</td>
                                    <td style="padding:10px 10px;">
                                        <span
                                            style="background:#f3f4f6;color:#293857;padding:4px 10px;border-radius:4px;font-size:12px;">Aktivitas</span>
                                    </td>
                                    <td style="padding:10px 10px;text-align:center;">
                                        <a href="#"
                                            style="color:#0f1f3d;text-decoration:underline;font-size:12.5px;white-space:nowrap;">Lihat</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="7"
                                        style="text-align:center;padding:19px 0;color:#9ca3af;font-size:13px;">

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
        // Tabs that show the Rekening card
        const showRekening = ['perwakilan', 'kepala'];

        function switchTab(btn, tabId) {
            document.querySelectorAll('.nav-tabs-custom .nav-link').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            const pane = document.getElementById('tab-' + tabId);
            if (pane) pane.classList.add('active');

            const rekening = document.getElementById('rekeningCard');
            if (rekening) rekening.style.display = showRekening.includes(tabId) ? 'block' : 'none';
        }

        function copyToClipboard(text, icon) {
            navigator.clipboard.writeText(text).then(() => {
                icon.classList.replace('bi-copy', 'bi-check2');
                setTimeout(() => icon.classList.replace('bi-check2', 'bi-copy'), 1500);
            });
        }
    </script>
@endsection
