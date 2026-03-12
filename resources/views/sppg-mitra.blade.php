@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');



        /* .page-title {
                                        font-size: 22px;
                                        font-weight: 700;
                                        color: #111827;
                                        margin-bottom: 20px;
                                    } */

        /* ── Status Tab Pills ── */
        .status-tabs {
            display: flex;
            align-items: center;
            gap: 2px;
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 10px;
            padding: 5px 8px;
            width: fit-content;
            margin: 0 auto 24px auto;
            flex-wrap: wrap;
        }

        .status-tab {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 7px;
            font-size: 13.5px;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            border: none;
            background: none;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .status-tab:hover {
            background: #f3f4f6;
            color: #374151;
        }

        .status-tab.active {
            background: #f3f4f6;
            color: #111827;
            font-weight: 600;
        }

        .tab-count {
            background: #e5e7eb;
            color: #374151;
            font-size: 11px;
            font-weight: 700;
            border-radius: 20px;
            padding: 1px 7px;
            min-width: 20px;
            text-align: center;
        }

        /* ── Main Card ── */
        .main-card {
            background: #fff;
            border: 1px solid #e5e9ef;
            border-radius: 12px;
            overflow: hidden;
        }

        .card-section-title {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
            padding: 16px 20px 14px;
            border-bottom: 1px solid #f0f2f5;
        }

        /* ── Filter ── */
        .filter-section {
            padding: 16px 20px;
            border-bottom: 1px solid #f0f2f5;
        }

        .filter-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .filter-label {
            font-size: 13.5px;
            font-weight: 600;
            color: #374151;
        }

        .filter-reset {
            font-size: 13px;
            font-weight: 600;
            color: #dc2626;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: color 0.15s;
        }

        .filter-reset:hover {
            color: #b91c1c;
            text-decoration: underline;
        }

        .filter-status-label {
            font-size: 13px;
            color: #374151;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .filter-select {
            width: 100%;
            padding: 9px 36px 9px 12px;
            border: 1.5px solid #e5e9ef;
            border-radius: 8px;
            font-size: 14px;
            color: #374151;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") no-repeat right 12px center;
            appearance: none;
            outline: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: border-color 0.15s;
            cursor: pointer;
        }

        .filter-select:focus {
            border-color: #1a2a4a;
        }

        /* ── Search Bar ── */
        .search-section {
            display: flex;
            justify-content: flex-end;
            padding: 12px 20px;
            border-bottom: 1px solid #f0f2f5;
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
        }

        .search-input {
            width: 100%;
            padding: 8px 12px 8px 32px;
            border: 1.5px solid #e5e9ef;
            border-radius: 8px;
            font-size: 13.5px;
            color: #374151;
            font-family: 'Plus Jakarta Sans', sans-serif;
            outline: none;
            transition: border-color 0.15s;
            background: #fff;
        }

        .search-input:focus {
            border-color: #1a2a4a;
        }

        .search-input::placeholder {
            color: #9ca3af;
        }

        /* ── Empty State ── */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 64px 20px;
            gap: 14px;
        }

        .empty-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1.5px solid #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 18px;
        }

        .empty-text {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
        }

        /* ── Table ── */
        .table-scroll {
            overflow-x: auto;
        }

        .sppg-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }

        .sppg-table thead tr {
            background: #f9fafb;
            border-bottom: 1px solid #e5e9ef;
        }

        .sppg-table th {
            padding: 11px 14px;
            font-size: 12.5px;
            font-weight: 600;
            color: #6b7280;
            text-align: left;
            white-space: nowrap;
            user-select: none;
        }

        .sppg-table th.sortable {
            cursor: pointer;
        }

        .sppg-table th.sortable:hover {
            color: #1a2a4a;
        }

        .th-inner {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .sppg-table tbody tr {
            border-bottom: 1px solid #f0f2f5;
            transition: background 0.1s;
        }

        .sppg-table tbody tr:last-child {
            border-bottom: none;
        }

        .sppg-table tbody tr:hover {
            background: #f9fafb;
        }

        .sppg-table td {
            padding: 11px 14px;
            color: #374151;
            vertical-align: top;
        }

        .td-id {
            font-weight: 600;
            color: #1a2a4a;
            font-size: 13px;
        }

        /* Badges */
        .badge-status {
            display: inline-block;
            font-size: 11.5px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .badge-pks {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-tolak {
            background: #fee2e2;
            color: #dc2626;
        }

        .badge-proses {
            background: #fef9c3;
            color: #a16207;
        }

        .badge-terima {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-menunggu {
            background: #f3f4f6;
            color: #374151;
        }

        /* Kesiapan */
        .kesiapan-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .tag-kesiapan {
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 11px;
            font-weight: 500;
            padding: 2px 8px;
            border-radius: 20px;
            white-space: nowrap;
        }

        /* Table footer */
        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 20px;
            font-size: 13px;
            color: #6b7280;
            border-top: 1px solid #f0f2f5;
            flex-wrap: wrap;
            gap: 10px;
        }

        .per-page-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .per-page-select {
            padding: 5px 28px 5px 10px;
            border: 1.5px solid #e5e9ef;
            border-radius: 7px;
            font-size: 13px;
            color: #374151;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") no-repeat right 8px center;
            appearance: none;
            outline: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
        }

        @media (max-width: 575px) {
            .status-tabs {
                width: 100%;
                justify-content: center;
            }

            .search-wrap {
                width: 100%;
            }

            .search-section {
                justify-content: stretch;
            }
        }
    </style>
    <main class="main-content">
        <div class="page-inner">
            <h1 class="page-title">SPPG Mitra Non-Yayasan</h1>

            {{-- Status Tab Pills --}}
            <div class="status-tabs">
                <button class="status-tab active" data-status="semua" onclick="filterStatus(this,'semua')">Semua</button>
                <button class="status-tab" data-status="menunggu" onclick="filterStatus(this,'menunggu')">
                    Menunggu Konfirmasi <span class="tab-count" id="count-menunggu">0</span>
                </button>
                <button class="status-tab" data-status="disetujui" onclick="filterStatus(this,'disetujui')">
                    Disetujui <span class="tab-count" id="count-disetujui">0</span>
                </button>
                <button class="status-tab" data-status="ditolak" onclick="filterStatus(this,'ditolak')">
                    Ditolak <span class="tab-count" id="count-ditolak">0</span>
                </button>
            </div>

            {{-- Main Card --}}
            <div class="main-card">
                <div class="card-section-title">SPPG Mitra Non-Yayasan</div>

                {{-- Filter --}}
                <div class="filter-section">
                    <div class="filter-header">
                        <span class="filter-label">Filter</span>
                        <button class="filter-reset" onclick="resetFilter()">Atur ulang filter</button>
                    </div>
                    <div class="filter-status-label">Status</div>
                    <select class="filter-select" id="filterSelect" onchange="applyFilter()">
                        <option value="">Semua</option>
                        <option value="menunggu">Menunggu Konfirmasi</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                {{-- Search --}}
                <div class="search-section">
                    <div class="search-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" class="search-input" id="searchInput" placeholder="Cari">
                    </div>
                </div>

                @php $lokasi = $lokasi ?? []; @endphp

                @if (count($lokasi) > 0)
                    {{-- Table --}}
                    <div class="table-scroll">
                        <table class="sppg-table">
                            <thead>
                                <tr>
                                    <th class="sortable" onclick="sortTable(0)"><span class="th-inner">ID SPPG <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th>Status</th>
                                    <th class="sortable" onclick="sortTable(2)"><span class="th-inner">Provinsi <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th class="sortable" onclick="sortTable(3)"><span class="th-inner">Kota/Kabupaten <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th class="sortable" onclick="sortTable(4)"><span class="th-inner">Kecamatan <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th class="sortable" onclick="sortTable(5)"><span class="th-inner">Kelurahan/Desa <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th class="sortable" onclick="sortTable(6)"><span class="th-inner">Luas Tanah <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th class="sortable" onclick="sortTable(7)"><span class="th-inner">Luas Dapur <i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th>Kesiapan SPPG</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($lokasi as $item)
                                    @php
                                        $sk = strtolower($item->status ?? '');
                                        $sc = match ($sk) {
                                            'pks' => 'badge-pks',
                                            'ditolak' => 'badge-tolak',
                                            'proses' => 'badge-proses',
                                            'diterima' => 'badge-terima',
                                            'menunggu' => 'badge-menunggu',
                                            default => 'badge-proses',
                                        };
                                    @endphp
                                    <tr data-status="{{ $sk }}">
                                        <td class="td-id">{{ $item->id_sppg }}</td>
                                        <td><span class="badge-status {{ $sc }}">{{ $item->status }}</span></td>
                                        <td>{{ $item->provinsi }}</td>
                                        <td>{{ $item->kota }}</td>
                                        <td>{{ $item->kecamatan }}</td>
                                        <td>{{ $item->kelurahan }}</td>
                                        <td>{{ $item->luas_tanah }}</td>
                                        <td>{{ $item->luas_dapur }}</td>
                                        <td>
                                            <div class="kesiapan-wrap">
                                                @foreach ($item->kesiapan ?? [] as $tag)
                                                    <span class="tag-kesiapan">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-footer">
                        <div id="footerInfo">Menampilkan 1 sampai {{ count($lokasi) }} dari {{ count($lokasi) }} hasil
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
                @else
                    {{-- Empty State --}}
                    <div class="empty-state" id="emptyState">
                        <div class="empty-icon"><i class="bi bi-x-lg"></i></div>
                        <div class="empty-text">Tidak ada data yang ditemukan</div>
                    </div>
                @endif
            </div>
        </div>
    </main>
    <script>
        let activeStatus = 'semua';

        function filterStatus(btn, status) {
            document.querySelectorAll('.status-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeStatus = status;
            applyFilter();
        }

        function applyFilter() {
            const selectVal = document.getElementById('filterSelect').value.toLowerCase();
            const searchVal = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            if (!rows.length) return;

            let visible = 0;
            rows.forEach(row => {
                const rowStatus = (row.dataset.status ?? '').toLowerCase();
                const matchTab = activeStatus === 'semua' || rowStatus === activeStatus;
                const matchSelect = !selectVal || rowStatus === selectVal;
                const matchSearch = row.textContent.toLowerCase().includes(searchVal);
                const show = matchTab && matchSelect && matchSearch;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            const info = document.getElementById('footerInfo');
            if (info) info.textContent = `Menampilkan ${visible} dari ${rows.length} hasil`;

            const empty = document.getElementById('emptyState');
            if (empty) empty.style.display = visible === 0 ? 'flex' : 'none';
        }

        function resetFilter() {
            document.getElementById('filterSelect').value = '';
            document.getElementById('searchInput').value = '';
            document.querySelectorAll('.status-tab').forEach(b => b.classList.remove('active'));
            document.querySelector('[data-status="semua"]').classList.add('active');
            activeStatus = 'semua';
            applyFilter();
        }

        document.getElementById('searchInput').addEventListener('input', applyFilter);

        let sortDir = {};

        function sortTable(colIdx) {
            const tbody = document.getElementById('tableBody');
            if (!tbody) return;
            const rows = Array.from(tbody.querySelectorAll('tr'));
            const asc = !sortDir[colIdx];
            sortDir = {};
            sortDir[colIdx] = asc;
            rows.sort((a, b) => {
                const av = a.cells[colIdx]?.textContent.trim() ?? '';
                const bv = b.cells[colIdx]?.textContent.trim() ?? '';
                return asc ? av.localeCompare(bv, 'id', {
                        numeric: true
                    }) :
                    bv.localeCompare(av, 'id', {
                        numeric: true
                    });
            });
            rows.forEach(r => tbody.appendChild(r));
        }

        // Count badges
        (function() {
            const rows = document.querySelectorAll('#tableBody tr');
            const counts = {
                menunggu: 0,
                disetujui: 0,
                ditolak: 0
            };
            rows.forEach(r => {
                const s = (r.dataset.status ?? '').toLowerCase();
                if (s in counts) counts[s]++;
            });
            Object.entries(counts).forEach(([k, v]) => {
                const el = document.getElementById('count-' + k);
                if (el) el.textContent = v;
            });
        })();
    </script>

@endsection
