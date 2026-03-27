@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        html,

        /* ─── PAGE WRAPPER ─── */
        .sppg-page {
            padding: 28px 32px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ─── BREADCRUMB ─── */
        .breadcrumb-custom {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 6px;
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

        .breadcrumb-custom i {
            font-size: 11px;
        }

        /* ─── PAGE HEADER ─── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #0f1f3d;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, transform 0.12s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #1a3060;
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-add:active {
            transform: translateY(0);
        }

        /* ─── CARD ─── */
        .table-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e5e9ef;
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* ─── SEARCH BAR ─── */
        .table-toolbar {
            display: flex;
            justify-content: flex-end;
            padding: 16px 20px 0 20px;
        }

        .search-wrap {
            position: relative;
            width: 220px;
        }

        .search-wrap i {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 14px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 8px 12px 8px 32px;
            border: 1.5px solid #e5e9ef;
            border-radius: 8px;
            font-size: 13.5px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #111827;
            background: #fff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-input::placeholder {
            color: #9ca3af;
        }

        .search-input:focus {
            border-color: #1a2a4a;
            box-shadow: 0 0 0 3px rgba(26, 42, 74, 0.07);
        }

        /* ─── TABLE SCROLL WRAPPER ─── */
        .table-scroll {
            overflow-x: auto;
            overflow-y: auto;
            flex: 1;
            -webkit-overflow-scrolling: touch;
        }

        /* ─── TABLE ─── */
        .sppg-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
            font-size: 13.5px;
        }

        .sppg-table thead tr {
            border-top: 1px solid #e5e9ef;
            border-bottom: 1.5px solid #e5e9ef;
        }

        .sppg-table th {
            padding: 11px 14px;
            font-weight: 600;
            color: #374151;
            font-size: 13px;
            white-space: nowrap;
            background: #fff;
            text-align: left;
            user-select: none;
        }

        .sppg-table th.sortable {
            cursor: pointer;
        }

        .sppg-table th.sortable:hover {
            color: #1a2a4a;
        }

        .th-inner {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .sort-icon {
            font-size: 11px;
            color: #9ca3af;
        }

        .sppg-table tbody tr {
            border-bottom: 1px solid #f0f2f5;
            transition: background 0.12s;
            vertical-align: top;
        }

        .sppg-table tbody tr:hover {
            background: #f9fafb;
        }

        .sppg-table td {
            padding: 14px 14px;
            color: #374151;
            font-size: 13.5px;
            vertical-align: middle;
        }

        /* ID SPPG col */
        .td-id {
            font-weight: 600;
            color: #111827;
            white-space: nowrap;
        }

        /* Status badges */
        .badge-status {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-pks {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-tolak {
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-proses {
            background: #eef2ff;
            color: #4f46e5;
            font-weight: 600;
            font-size: 13px;
            padding: 3px 14px;
            border-radius: 9px;
            box-shadow: none;
            border: none;
        }

        .badge-terima {
            background: #dcfce7;
            color: #15803d;
        }

        /* Kesiapan tags */
        .kesiapan-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            min-width: 200px;
        }

        .tag-kesiapan {
            background: #f3f4f6;
            color: #374151;
            font-size: 11.5px;
            font-weight: 500;
            padding: 3px 9px;
            border-radius: 5px;
            white-space: nowrap;
            border: 1px solid #e5e7eb;
        }

        /* ─── FOOTER ─── */
        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 20px;
            border-top: 1px solid #e5e9ef;
            flex-wrap: wrap;
            gap: 10px;
        }

        .table-footer-info {
            font-size: 13px;
            color: #6b7280;
        }

        .per-page-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #6b7280;
        }

        .per-page-select {
            padding: 5px 28px 5px 10px;
            border: 1.5px solid #e5e9ef;
            border-radius: 7px;
            font-size: 13px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #374151;
            background: #fff;
            outline: none;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            transition: border-color 0.15s;
        }

        .per-page-select:focus {
            border-color: #1a2a4a;
        }

        /* ─── EMPTY STATE ─── */
        .empty-row td {
            text-align: center;
            padding: 40px;
            color: #9ca3af;
            font-size: 14px;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 767px) {
            .sppg-page {
                padding: 16px;
            }

            .page-title {
                font-size: 20px;
            }

            .table-toolbar {
                padding: 12px 14px 0;
            }

            .search-wrap {
                width: 100%;
            }

            .table-toolbar {
                justify-content: stretch;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
    <main class="main-content">
        <div class="page-inner">

            {{-- Breadcrumb --}}
            <div class="breadcrumb-custom">
                <a href="#">Pengajuan Lokasi SPPG</a>
                <i class="bi bi-chevron-right"></i>
                <span>Daftar</span>
            </div>

            {{-- Header --}}
            <div class="page-header">
                <h1 class="page-title">Pengajuan Lokasi SPPG</h1>
                <a href="javascript:void(0);" class="btn-add" onclick="showConfirmationModal()">
                    <i class="bi bi-plus-lg"></i> Ajukan Lokasi Baru
                </a>
            </div>

            <!-- Modal Konfirmasi -->
            <div id="confirmationModal"
                style="display:none; position:fixed; z-index:1050; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.18);">
                <div
                    style="position:relative; width:100vw; height:100vh; display:flex; align-items:flex-start; justify-content:center;">
                    <div id="modal-card"
                        style="background:#fff; border-radius:16px; width:100%; max-width:410px; min-width:320px; padding:28px 27px 24px 27px; box-shadow: 0 6px 32px rgba(0,0,0,0.12);display:flex; flex-direction:column; align-items:center; margin-top:32px; position:relative;">
                        <img src="{{ asset('icon/Logo_Badan_Gizi_Nasional_(2024).png') }}" alt="Logo Badan Gizi Nasional"
                            style="width:110px; height:110px; object-fit:contain; margin-bottom:22px; background:#fff; border-radius:50%;border:3.5px solid #e5e7eb;">
                        <div
                            style="font-size:22px; font-weight:700; color:#232b36; margin-bottom:14px; text-align:center; line-height:1.2;">
                            Penutupan Pendaftaran<br> Mitra BGN
                        </div>
                        <div style="font-size:15px; color:#556070; line-height:1.7; text-align:center; margin-bottom:30px;">
                            Pendaftaran Mitra mitra Satuan Pelayanan Pemenuhan Gizi (SPPG) untuk Program Makan Bergizi
                            Gratis (MBG) telah ditutup guna mengendalikan jumlah dan sebaran SPPG, agar layanan gizi dapat
                            tersebar lebih merata. Kami mohon maaf atas ketidaknyamanan yang mungkin timbul dan berterima
                            kasih atas pengertian serta kerja samanya.
                        </div>
                        <button onclick="hideConfirmationModal()"
                            style="padding:11px 38px;border-radius:8px;border:none;background:#142544;color:#fff;font-size:15px;font-weight:500;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:7px;margin-bottom:12px;">
                            <i class="bi bi-arrow-left" style="font-size:17px;"></i> Kembali
                        </button>
                        <div style="display:flex; gap:22px; align-items:center; justify-content:center; margin-top:3px;">
                            <a href="https://instagram.com" target="_blank" style="color:#232b36;">
                                <i class="bi bi-instagram" style="font-size:20px;"></i>
                            </a>
                            <a href="https://www.facebook.com" target="_blank" style="color:#232b36;">
                                <i class="bi bi-facebook" style="font-size:19px;"></i>
                            </a>
                            <a href="mailto:info@bgn.go.id" style="color:#232b36;">
                                <i class="bi bi-envelope" style="font-size:19px;"></i>
                            </a>
                        </div>
                        <button onclick="hideConfirmationModal()"
                            style="position:absolute;top:15px;right:15px;border:none;background:none;font-size:25px;line-height:1;color:#bbc0cd;cursor:pointer;padding:0;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <script>
                function showConfirmationModal() {
                    document.getElementById('confirmationModal').style.display = 'block';
                }

                function hideConfirmationModal() {
                    document.getElementById('confirmationModal').style.display = 'none';
                }

                function handleConfirm() {
                    showConfirmationModal();
                }
            </script>


            {{-- Table Card --}}
            <div class="table-card">

                {{-- Toolbar --}}
                <div class="table-toolbar">
                    <div class="search-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" class="search-input" placeholder="Cari" id="searchInput">
                    </div>
                </div>

                {{-- Table --}}
                <div class="table-scroll">
                    <table class="sppg-table" id="sppgTable">
                        <thead>
                            <tr>
                                <th class="sortable" onclick="sortTable(0)">
                                    <span class="th-inner">ID SPPG <i class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th>Status</th>
                                <th class="sortable" onclick="sortTable(2)">
                                    <span class="th-inner">Provinsi <i class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th class="sortable" onclick="sortTable(3)">
                                    <span class="th-inner">Kota/Kabupaten <i
                                            class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th class="sortable" onclick="sortTable(4)">
                                    <span class="th-inner">Kecamatan <i class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th class="sortable" onclick="sortTable(5)">
                                    <span class="th-inner">Kelurahan/Desa <i
                                            class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th class="sortable" onclick="sortTable(6)">
                                    <span class="th-inner">Luas Tanah <i class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th class="sortable" onclick="sortTable(7)">
                                    <span class="th-inner">Luas Dapur <i class="bi bi-chevron-expand sort-icon"></i></span>
                                </th>
                                <th>Kesiapan SPPG</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr>
                                <td class="td-id">B2GCL2GS</td>
                                <td>
                                    <span class="badge-status badge-proses">Proses Persiapan</span>
                                </td>
                                <td>JAWA BARAT</td>
                                <td>KAB. BOGOR</td>
                                <td>BOJONG GEDE</td>
                                <td>RAGAJAYA</td>
                                <td>300 m<sup>2</sup></td>
                                <td>300 m<sup>2</sup></td>
                                <td> -
                                    {{-- <div class="kesiapan-wrap">

                                        <span class="tag-kesiapan">Alat K3</span>
                                        <span class="tag-kesiapan">Pekerja Lokal</span>
                                        <span class="tag-kesiapan">Pemasok Bahan Baku</span>
                                        <span class="tag-kesiapan">Peralatan Dapur</span>

                                    </div> --}}
                                </td>
                                <td>
                                    <a href="{{ route('otp.pl-detail') }}" class="btn btn-primary btn-sm"
                                        style="padding:2px 8px; border-radius:4px; font-size:12px; font-weight:500;">
                                        <i class="bi bi-eye" style="margin-right:2px;font-size:13px;"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Footer --}}
                <div class="table-footer">
                    <div class="table-footer-info" id="footerInfo">
                        Menampilkan 1 dari 1 hasil
                    </div>
                    <div class="per-page-wrap">
                        <span>per halaman</span>
                        <select class="per-page-select" id="perPage">
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <script>
        // ── Live search ──
        document.getElementById('searchInput').addEventListener('input', function() {
            const q = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            let visible = 0;
            rows.forEach(row => {
                const match = row.textContent.toLowerCase().includes(q);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            const total = rows.length;
            document.getElementById('footerInfo').textContent =
                `Menampilkan ${visible} dari ${total} hasil`;
        });

        // ── Column sort ──
        let sortDir = {};

        function sortTable(colIdx) {
            const tbody = document.getElementById('tableBody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            const asc = !sortDir[colIdx];
            sortDir = {};
            sortDir[colIdx] = asc;

            rows.sort((a, b) => {
                const aVal = a.cells[colIdx]?.textContent.trim() ?? '';
                const bVal = b.cells[colIdx]?.textContent.trim() ?? '';
                return asc ?
                    aVal.localeCompare(bVal, 'id', {
                        numeric: true
                    }) :
                    bVal.localeCompare(aVal, 'id', {
                        numeric: true
                    });
            });

            rows.forEach(r => tbody.appendChild(r));
        }
    </script>
@endsection
