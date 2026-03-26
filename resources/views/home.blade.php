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
                    <img src="{{ asset('icon/logo-yayasan.png.jpeg') }}" alt="Logo"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'bi bi-building\'></i>'">
                </div>
                <div class="profile-card-info">
                    <h2>{{ $mitra->nama ?? 'YAYASAN PONDOK PESANTREN MANBA HIDAYATUL MAARIF' }}</h2>
                    <div class="profile-card-meta">
                        <span>{{ $mitra->email ?? 'manbahidayatulmaarif01@gmail.com' }}</span>
                        <span class="sep">|</span>
                        <span>{{ $mitra->telepon ?? '082112556664' }}</span>
                        <span class="sep">|</span>
                        <span class="badge-verified">Terverifikasi</span>
                    </div>
                </div>
                <div class="profile-card-id">
                    <span>ID Mitra : {{ $mitra->id_mitra ?? 'B2GCL2GS' }}
                        <i class="bi bi-copy ms-1" style="cursor:pointer;font-size:13px;" title="Salin ID"></i>
                    </span>
                    <strong>{{ $mitra->nomor ?? '1306250071621' }}</strong>
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
                <button class="nav-link active" onclick="switchTab(this,'umum')"><strong>Umum</strong></button>
                <button class="nav-link" onclick="switchTab(this,'legal')"><strong>Legal</strong></button>
                <button class="nav-link" onclick="switchTab(this,'keuangan')"><strong>Keuangan</strong></button>
                <button class="nav-link" onclick="switchTab(this,'calon-sppg')"><strong>Calon SPPG <span
                            class="tab-badge">1</span></strong></button>
                <button class="nav-link" onclick="switchTab(this,'calon-sppg-mitra')"><strong>Calon SPPG Mitra <span
                            class="tab-badge">0</span></strong></button>
                <button class="nav-link" onclick="switchTab(this,'perwakilan')"><strong>Perwakilan Yayasan <span
                            class="tab-badge">1</span></strong></button>
                <button class="nav-link" onclick="switchTab(this,'riwayat')"><strong>Riwayat Verifikasi Email <span
                            class="tab-badge">0</span></strong></button>
            </div>

            {{-- Tab: Umum --}}
            <div id="tab-umum" class="tab-pane active">
                <div class="section-card">
                    <form class="akun-mitra-form"
                        style="background:#fafbfc; border-radius:10px; padding:28px 28px 18px 28px; margin-bottom:28px; border:1px solid #ececec;">
                        <div class="section-title">
                            Informasi Akun <span class="required">*</span>
                            <span class="section-status"><i class="bi bi-clock"></i> Dalam Proses</span>
                        </div>
                        <div style="margin-bottom: 32px;">
                            <div style="font-weight: 600; margin-bottom: 12px;">Logo Mitra</div>
                            <img src="{{ asset('icon/logo-yayasan.png.jpeg') }}" alt="Logo Mitra"
                                style="width:86px;height:86px;object-fit:contain;border-radius:10px;box-shadow:0 0 10px #ececec;margin-bottom:20px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Nama Ketua/Direktur Utama<span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" value="Ferdy Husin">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" value="manbahidayatulmaarif01@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Nomor Telepon<span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" value="08998454419">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Nama Instansi<span
                                    class="required">*</span></label>
                            <input type="text" class="form-control"
                                value="YAYASAN PONDOK PESANTREN MANBA HIDAYATUL MAARIF">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Tipe Instansi</label>
                            <select class="form-select">
                                <option selected>Yayasan</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" style="margin-top:8px;">Simpan</button>
                    </form>

                    {{-- Form Alamat Mitra --}}
                    <form class="alamat-mitra-form"
                        style="background:#fafbfc; border-radius:10px; padding:28px 28px 18px 28px; margin-top:24px; border:1px solid #ececec;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom:15px;">
                            <div class="section-title" style="margin-bottom:0; font-weight:600; font-size:16px;">Alamat
                                Mitra <span class="required">*</span></div>
                            <button type="button" class="btn btn-sm btn-light"
                                style="color:#666; border:none; background:transparent;"><i class="bi bi-pencil"></i>
                                Ubah</button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Provinsi<span
                                    class="required">*</span></label>
                            <select class="form-select">
                                <option selected>JAWA BARAT</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Kota<span
                                    class="required">*</span></label>
                            <select class="form-select">
                                <option selected>KAB. BOGOR</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Kecamatan<span
                                    class="required">*</span></label>
                            <select class="form-select">
                                <option selected>BOJONG GEDE</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Desa/Kelurahan<span
                                    class="required">*</span></label>
                            <select class="form-select">
                                <option selected>Ragajaya</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Kode Pos*</label>
                            <input type="text" class="form-control" value="16920">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Alamat*</label>
                            <textarea class="form-control" rows="2">Jl Bakti Kp Ceringin Rt 04/08 Desa Ragajaya </textarea>
                        </div>

                        <button type="button" class="btn btn-primary"
                            style="float:right;margin-top:6px;">Simpan</button>
                    </form>
                    {{-- End Form Alamat Mitra --}}
                </div>
            </div>

            <div id="tab-legal" class="tab-pane">
                <div class="section-card"
                    style="padding: 28px 24px 22px 24px; border-radius: 13px; background: #fff; box-shadow: 0 1px 6px rgba(60,72,100,0.07);">
                    <div class="section-title d-flex align-items-center justify-content-between"
                        style="font-size: 1rem; font-weight: 600; margin-bottom: 20px;">
                        <span>Akta Badan Usaha <span class="required" style="color:#de3b22;">*</span></span>
                        <button type="button" class="btn btn-light btn-sm d-flex align-items-center"
                            style="background: #f9f9f9; border: 1px solid #e0e0e0; color: #525463; border-radius: 7px; font-size: 14px; font-weight: 500; gap: 6px; height: 32px; box-shadow:none;">
                            <i class="bi bi-pencil-square" style="font-size:16px"></i>
                            <span>Rubah</span>
                        </button>
                    </div>

                    <div class="table-responsive" style="margin-top: 10px;">
                        <div class="d-flex justify-content-end align-items-center mb-2" style="margin-bottom: 13px;">
                            <div style="width:240px;">
                                <input type="search" class="form-control form-control-sm"
                                    style="background:#f8fafc; border-radius:7px; border: 1px solid #e5e7eb; height:34px; font-size:14px;"
                                    placeholder="Cari">
                            </div>
                        </div>
                        <table class="table mb-2"
                            style="background:#fff; border:1px solid #e5e7eb; border-radius:8px; margin-bottom:11px;">
                            <thead style="background:#f8fafc;border-bottom:1px solid #e5e7eb;">
                                <tr>
                                    <th
                                        style="min-width:130px; font-size:14px; font-weight:600; color:#61677c; background:transparent;">
                                        Tipe Akta <span style="vertical-align:middle; color:#d0d4da; font-size:13px;"><i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th
                                        style="min-width:120px; font-size:14px; font-weight:600; color:#61677c; background:transparent;">
                                        Nomor Akta <span style="vertical-align:middle; color:#d0d4da; font-size:13px;"><i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th
                                        style="min-width:120px; font-size:14px; font-weight:600; color:#61677c; background:transparent;">
                                        Tanggal Akta <span style="vertical-align:middle; color:#d0d4da; font-size:13px;"><i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th
                                        style="min-width:140px; font-size:14px; font-weight:600; color:#61677c; background:transparent;">
                                        Nama Notaris <span style="vertical-align:middle; color:#d0d4da; font-size:13px;"><i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th
                                        style="min-width:120px; font-size:14px; font-weight:600; color:#61677c; background:transparent;">
                                        Lampiran</th>
                                    <th
                                        style="width:80px; font-size:14px; font-weight:600; color:#61677c; background:transparent;">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid #f3f3f5;">
                                    <td style="font-size:14px; color:#232338; background:transparent;">Pendirian</td>
                                    <td style="font-size:14px; color:#232338; background:transparent;">AHU-0264.AH.02.01
                                    </td>
                                    <td style="font-size:14px; color:#232338; background:transparent;">2025-08-06</td>06
                                    <td style="font-size:14px; color:#232338; background:transparent;">ALEX MONDRI, SH,
                                        MKn.</td>
                                    <td style="font-size:14px; color:#2563dc; background:transparent;white-space:nowrap;">
                                        <a href="{{ asset('file/Dokumen51.pdf') }}" download class="btn btn-link"
                                            style="padding:0;font-size:14px;color:#2563dc;text-decoration:underline;">
                                            <i class="bi bi-download"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="section-card" style="margin-bottom: 24px;">
                    <div class="d-flex justify-content-between align-items-center" style="margin-bottom:9px;">
                        <div class="section-title" style="margin-bottom:0;">
                            SK Kemenkumham <span class="required" style="color:#ef4444;">*</span>
                        </div>
                        <button type="button" class="btn btn-sm btn-light"
                            style="border-radius: 7px;height:31px;font-size:13px;font-weight:500;padding:0 18px;border:1px solid #e5e7eb;box-shadow:none;outline:none;background:#f8fafc;color:#52525b;">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </button>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mb-2" style="margin-bottom:13px;">
                        <div style="width:220px;">
                            <input type="search" class="form-control form-control-sm"
                                style="background:#f8fafc; border-radius:7px; border: 1px solid #e5e7eb; height:34px; font-size:14px;"
                                placeholder="Cari">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-1" style="background:#fff; border:1px solid #e5e7eb; border-radius:8px;">
                            <thead style="background:#f8fafc;border-bottom:1px solid #e5e7eb;">
                                <tr>
                                    <th
                                        style="font-size:14px;font-weight:600;color:#61677c;padding:12px 14px;vertical-align:middle;">
                                        Nomor SK <span style="vertical-align:middle; color:#d0d4da; font-size:13px;"><i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th
                                        style="font-size:14px;font-weight:600;color:#61677c;padding:12px 14px;vertical-align:middle;">
                                        Tanggal Pembuatan <span
                                            style="vertical-align:middle; color:#d0d4da; font-size:13px;"><i
                                                class="bi bi-chevron-expand"></i></span></th>
                                    <th
                                        style="font-size:14px;font-weight:600;color:#61677c;padding:12px 14px;vertical-align:middle;">
                                        Lampiran</th>
                                    <th style="width:100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid #f3f3f5;">
                                    <td style="font-size:14px; color:#232338; background:transparent; padding:11px 14px;">
                                        AHU-AH.01.06-0055654</td>
                                    <td style="font-size:14px; color:#232338; background:transparent; padding:11px 14px;">
                                        2025-08-07</td>
                                    <td style="font-size:14px; background:transparent; padding:11px 14px;">
                                        <a href="{{ asset('file/Dokumen50.pdf') }}" target="_blank"
                                            style="color:#2563dc; text-decoration:underline;word-break:break-all;">GVJYDSHDFKD4HPHQ3947EX7CU.pdf</a>
                                    </td>
                                    <td
                                        style="font-size:14px;background:transparent; padding:11px 14px;white-space:nowrap;">
                                        <a href="#" class="disabled"
                                            style="pointer-events:none; opacity:0.5; color:#2196f3;text-decoration:none;font-weight:500;margin-right:14px;display:inline-flex;align-items:center;font-size:14px;"><i
                                                class="bi bi-pencil-square me-1"></i>Ubah</a>
                                        <a href="#" class="disabled"
                                            style="pointer-events:none; opacity:0.5; color:#ef4444;text-decoration:none;font-weight:500;display:inline-flex;align-items:center;font-size:14px;"><i
                                                class="bi bi-trash3 me-1"></i>Hapus</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="section-card" style="margin-bottom:30px;">
                    <div class="section-title" style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                        NIB <span class="required" style="margin-left:2px;">*</span>
                        <button type="button" class="btn-edit"
                            style="margin-left:auto;background:none;border:none;color:#9CA3AF;font-size:15px;cursor:not-allowed;"
                            disabled>Edit</button>
                    </div>
                    <div style="margin-bottom:12px;">
                        <label style="display:block;font-size:13px;color:#6B7280;margin-bottom:7px;">Nomor Induk
                            Berusaha
                            (NIB)</label>
                        <input type="text" class="form-control"
                            style="width:100%;background:#FAFAFA;border:1.5px solid #E5E7EB;border-radius:7px;height:38px;padding:7px 12px;font-size:15px;color:#374151;"
                            value="0502260108372" readonly>
                    </div>
                    <div style="margin-bottom:10px;">
                        <label style="display:block;font-size:13px;color:#6B7280;margin-bottom:7px;">File NIB</label>
                        <div style="width:100%;position:relative;">
                            <div
                                style="display:flex;align-items:center;gap:8px;background:#444;border-radius:6px;padding:8px 10px;">
                                <span
                                    style="display:inline-flex;align-items:center;justify-content:center;width:23px;height:23px;background:#504949;border-radius:5px;">
                                    <svg width="15" height="15" viewBox="0 0 16 16" fill="none">
                                        <rect width="16" height="16" rx="3" fill="#E4E4E7" />
                                        <path
                                            d="M5.5 2.75A1.75 1.75 0 0 0 3.75 4.5v7A1.75 1.75 0 0 0 5.5 13.25h5A1.75 1.75 0 0 0 12.25 11.5v-5L10 2.75H5.5ZM5 4.5A.5.5 0 0 1 5.5 4h4.19l2.06 2.06a.5.5 0 0 1 .15.35V11.5a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 11.5v-7Z"
                                            fill="#71717A" />
                                    </svg>
                                </span>
                                <a href="{{ asset('file/OSS-NIB-1770283739207.pdf') }}" target="_blank"
                                    style="font-size:13.5px;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:210px;text-decoration:underline;display:inline-block;">
                                    61_UUM5MC8WPYUS7C5EXB8SRK7U.pdf
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="font-size:12px;color:#78716C;margin-bottom:20px;">
                        Pastikan dokumen memiliki format pdf dengan ukuran maksimal 2 MB.
                    </div>
                    <button type="button" class="btn btn-primary"
                        style="background:#E5E7EB;color:#C2C3C5;border-radius:6px;font-size:15px;padding:8px 22px;font-weight:600;border:none;cursor:not-allowed;"
                        disabled>Simpan</button>
                </div>
            </div>

            <div id="tab-keuangan" class="tab-pane">
                <div class="section-card">
                    <div class="section-card" style="margin-bottom:30px;">
                        <div class="section-title" style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                            Data NPWP Instansi <span class="required" style="margin-left:2px;">*</span>
                            <button type="button" class="btn-edit"
                                style="margin-left:auto;background:none;border:none;color:#9CA3AF;font-size:15px;cursor:not-allowed;"
                                disabled>Ubah</button>
                        </div>
                        <div style="margin-bottom:12px;">
                            <label style="display:block;font-size:13px;color:#6B7280;margin-bottom:7px;">Nomor NPWP 16
                                Digit*</label>
                            <input type="text" class="form-control"
                                style="width:100%;background:#FAFAFA;border:1.5px solid #E5E7EB;border-radius:7px;height:38px;padding:7px 12px;font-size:15px;color:#374151;"
                                value="92.518.776.7-403.000" readonly>
                            <div style="font-size:12.5px;color:#A3A3A3;margin-top:5px;">
                                Jika NPWP masih terdiri dari 15 digit, tambahkan angka '0' di awal
                            </div>
                        </div>
                        <div style="margin-bottom:12px;">
                            <label style="display:block;font-size:13px;color:#6B7280;margin-bottom:7px;">Nama*</label>
                            <div style="display:flex;align-items:center;gap:12px;">
                                <input type="text" class="form-control"
                                    style="width:100%;background:#FAFAFA;border:1.5px solid #E5E7EB;border-radius:7px;height:38px;padding:7px 12px;font-size:15px;color:#374151;"
                                    value="YAYASAN PESANTREN MANBA HIDAYATUL MAARIF" readonly>
                                <button type="button" class="btn-copy"
                                    style="background:none;border:none;color:#4877E2;font-size:13px;cursor:pointer;padding:0;height:auto;"
                                    disabled>Samakan dengan nama instansi</button>
                            </div>
                        </div>
                        <div style="margin-bottom:10px;">
                            <label style="display:block;font-size:13px;color:#6B7280;margin-bottom:7px;">Bukti
                                Laporan</label>
                            <div style="width:100%;position:relative;">
                                <div
                                    style="display:flex;align-items:center;gap:8px;background:#444;border-radius:6px;padding:8px 10px;">
                                    <span
                                        style="display:inline-flex;align-items:center;justify-content:center;width:23px;height:23px;background:#504949;border-radius:5px;">
                                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none">
                                            <rect width="16" height="16" rx="3" fill="#E4E4E7" />
                                            <path
                                                d="M5.5 2.75A1.75 1.75 0 0 0 3.75 4.5v7A1.75 1.75 0 0 0 5.5 13.25h5A1.75 1.75 0 0 0 12.25 11.5v-5L10 2.75H5.5ZM5 4.5A.5.5 0 0 1 5.5 4h4.19l2.06 2.06a.5.5 0 0 1 .15.35V11.5a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 11.5v-7Z"
                                                fill="#71717A" />
                                        </svg>
                                    </span>
                                    <span
                                        style="font-size:13.5px;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:210px;">
                                        62_GU29DPS66F5RF79F0N01V6T04V.pdf
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div style="font-size:12px;color:#78716C;margin-bottom:20px;">


                        </div>
                    </div>
                    <div class="section-card" style="margin-bottom:32px;">
                        <div class="section-title" style="display:flex;align-items:center;justify-content:space-between;">
                            <span>Laporan SPT</span>
                            <button type="button" class="btn-edit"
                                style="background: none; border: none; color: #828282; font-size: 13px; display:flex;align-items:center;gap:6px;">
                                <svg width="16" height="16" fill="none" style="vertical-align:middle;">
                                    <rect width="16" height="16" rx="3" fill="#F6F6F6" />
                                    <path
                                        d="M11.399 3.273a1.048 1.048 0 0 1 1.482 1.482l-6.06 6.06-1.313.131c-.387.039-.694-.267-.656-.655l.131-1.314 6.06-6.06ZM3 13h10v1H3v-1Z"
                                        fill="#828282" />
                                </svg>
                                Sunting
                            </button>
                        </div>
                        <div style="display:flex;align-items:center;justify-content:space-between;margin:18px 0 10px;">
                            <div>
                                <select
                                    style="padding:6px 10px;font-size:14px;border:1.5px solid #E5E7EB;background:#FAFAFA;border-radius:5px;outline:none;">
                                    <option>Tahun Periode</option>
                                    <option selected>2024</option>
                                </select>
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Cari"
                                    style="padding:6px 10px;font-size:14px;border:1.5px solid #E5E7EB;background:#FAFAFA;border-radius:5px;width:180px;">
                            </div>
                        </div>
                        <div style="overflow-x:auto;">
                            <table style="width:100%;border-collapse:collapse;font-size:14px;background:#fff;">
                                <thead>
                                    <tr style="background:#FAFAFA;">
                                        <th
                                            style="text-align:left;padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;width:140px;">
                                            Tahun Periode</th>
                                        <th
                                            style="text-align:left;padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                            Bukti Laporan</th>
                                        <th style="width:120px;padding:10px 12px;border-bottom:1px solid #ECECEC;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding:12px;">2024</td>
                                        <td style="padding:12px;">
                                            <a href="#" style="color:#2179D7;text-decoration:underline;"
                                                target="_blank">
                                                OLZKD7G5WAN0XZ7XMBE7N0CT7.pdf
                                            </a>
                                        </td>
                                        <td style="padding:12px;">
                                            <button type="button"
                                                style="background:none;border:none;color:#5C7DFA;font-size:14px;cursor:pointer;padding:0 7px 0 0;display:inline-flex;align-items:center;gap:4px;">

                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div id="tab-calon-sppg" class="tab-pane">
                <div class="section-card">
                    <div style="margin-bottom: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="section-title" style="margin: 0;">Calon Lokasi SPPG</div>
                            <button
                                style="background: #193763; color: #fff; border: none; border-radius: 6px; font-size: 14px; padding: 8px 18px; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                <i class="bi bi-plus" style="font-size: 16px;"></i> Ajukan Lokasi Baru
                            </button>
                        </div>
                    </div>
                    <div style="margin-bottom: 16px;">
                        <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                            <div>
                                <label style="font-size: 14px; margin-right: 8px;">Status</label>
                                <select
                                    style="padding: 6px 10px; font-size: 14px; border: 1.5px solid #E5E7EB; background: #FAFAFA; border-radius: 5px; outline: none;">
                                    <option>Semua</option>
                                    <option>Aktif</option>
                                    <option>Ditolak</option>
                                </select>
                            </div>
                            <div>
                                <a href="#"
                                    style="color: #2179D7; font-size: 13px; text-decoration: underline;">Atur ulang
                                    filter</a>
                            </div>
                            <div style="flex: 1 1 160px; max-width: 230px; margin-left: auto;">
                                <input type="text" class="form-control" placeholder="Cari"
                                    style="width: 100%; padding: 6px 10px; font-size: 14px; border: 1.5px solid #E5E7EB; background: #FAFAFA; border-radius: 5px;">
                            </div>
                        </div>
                    </div>
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 14px; background: #fff;">
                            <thead>
                                <tr style="background: #FAFAFA;">
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Status</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">ID
                                        SPPG</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Provinsi</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Kota/Kabupaten</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Kecamatan</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Kelurahan/Desa</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Luas Lahan</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Luas Bangunan</th>
                                    <th style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                        Kesiapan SPPG</th>
                                    <th style="padding: 10px 12px; border-bottom: 1px solid #ECECEC;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px 12px;">
                                        <span
                                            style="background: #F3F7FF; color: #4767DA; font-size: 13px; border-radius: 4px; padding: 3px 10px; font-weight: 500;">Aktif</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div id="tab-calon-sppg-mitra" class="tab-pane">
                <div class="section-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
                        <div class="section-title" style="margin-bottom: 0;">Calon Lokasi SPPG</div>
                        <button id="ajukanLokasiBtn" class="btn btn-primary"
                            style="font-size:14px; padding: 8px 18px; display:flex; align-items:center;">
                            <i class="bi bi-plus" style="margin-right:6px;"></i> Ajukan Lokasi Baru
                        </button>
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 24px;">
                        <input type="text" class="form-control" placeholder="Cari"
                            style="width: 220px; margin-right: 12px; padding: 6px 10px; font-size: 14px; border: 1.5px solid #E5E7EB; background: #FAFAFA; border-radius: 5px;"
                            disabled>
                    </div>
                    <div style="text-align: center; margin: 64px 0 68px 0;">
                        <div>
                            <span
                                style="display: inline-block; width: 38px; height: 38px; background: #F7F6FE; border-radius: 50%; line-height: 38px; text-align: center; font-size: 20px; margin-bottom: 14px; color: #D1D5DB; border: 1.5px solid #ECECEC;">
                                <i class="bi bi-x"></i>
                            </span>
                        </div>
                        <div style="font-size: 15px; color: #7B7B7B; font-weight: 500;">
                            Tidak ada data yang ditemukan
                        </div>
                    </div>

                    <!-- Pop Up Modal -->
                    <div id="ajukanModal"
                        style="display:none; position:fixed; z-index:9999; top:0; left:0; width:100vw; height:100vh; background:rgba(49,52,62,0.12);">
                        <div
                            style="background:#fff; border-radius:12px; box-shadow:0 4px 32px #0001; max-width:350px; margin:120px auto 0 auto; padding:28px 24px; position:relative;">
                            <button onclick="document.getElementById('ajukanModal').style.display='none'"
                                style="position:absolute; top:16px; right:16px; background:none; border:none; font-size:20px; color:#7B7B7B; cursor:pointer;"
                                aria-label="Tutup">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            <div style="text-align:center;">
                                <div style="margin-bottom:20px;">
                                    <i class="bi bi-exclamation-triangle" style="font-size: 42px; color:#FF885A;"></i>
                                </div>
                                <div style="font-size:17px; font-weight:600; margin-bottom:10px;">
                                    Tidak bisa mengajukan lokasi
                                </div>
                                <div style="font-size: 15px; color: #7B7B7B;">
                                    Pengajuan lokasi sudah ditutup.
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: 26px;">
                                <button onclick="document.getElementById('ajukanModal').style.display='none'"
                                    class="btn btn-primary" style="min-width: 110px;">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var btn = document.getElementById('ajukanLokasiBtn');
                            var modal = document.getElementById('ajukanModal');
                            if (btn) {
                                btn.addEventListener('click', function() {
                                    if (modal) modal.style.display = 'block';
                                });
                            }
                        });
                    </script>
                </div>
            </div>

            <div id="tab-perwakilan" class="tab-pane">
                <div class="section-card">
                    <div style="margin-bottom:24px; display:flex; justify-content:space-between; align-items:center;">
                        <div class="section-title" style="margin:0;">Perwakilan Yayasan</div>
                        <button
                            style="background: #173A63; color: #fff; border: none; border-radius: 6px; font-size: 14px; padding: 8px 18px; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                            <i class="bi bi-plus" style="font-size: 16px;"></i> Tambah Perwakilan Yayasan
                        </button>
                    </div>
                    <div
                        style="background: #fff; border-radius: 10px; box-shadow: 0 1px 4px rgba(0,0,0,0.02); padding: 20px; overflow-x: auto;">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                            <div></div>
                            <div style="max-width:210px;">
                                <input type="text" class="form-control" placeholder="Cari"
                                    style="width:100%;padding:7px 12px;font-size:14px;border:1.5px solid #E5E7EB;background:#F8FAFC;border-radius:5px;">
                            </div>
                        </div>
                        <table style="width:100%;border-collapse:collapse;font-size:14px;background:#fff;">
                            <thead>
                                <tr style="background:#F7F9FB;">
                                    <th
                                        style="text-align:left;padding:9px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Name</th>
                                    <th
                                        style="text-align:left;padding:9px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Email</th>
                                    <th
                                        style="text-align:left;padding:9px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        No. Telepon</th>
                                    <th
                                        style="text-align:left;padding:9px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Lokasi Penugasan</th>
                                    <th
                                        style="text-align:left;padding:9px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        No. KTP</th>
                                    <th
                                        style="text-align:left;padding:9px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Foto KTP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:10px 12px;">Lukmanul Hakim</td>
                                    <td style="padding:10px 12px;">lukmanmbg01@gmail.com</td>
                                    <td style="padding:10px 12px;">08998454419</td>
                                    <td style="padding:10px 12px;">
                                        <a href="#" style="color:#3375CB;text-decoration:underline;">-</a>
                                    </td>
                                    <td style="padding:10px 12px;">3201131911900008</td>
                                    <td style="padding:10px 12px;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div id="tab-riwayat" class="tab-pane">
                <div class="section-card">
                    <div class="section-title">Riwayat Verifikasi Email</div>
                    <p class="text-muted" style="font-size:14px;">Riwayat verifikasi email akan ditampilkan di
                        sini.
                    </p>
                </div>
            </div>

        </div>


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
