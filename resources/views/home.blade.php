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
                    <div class="profile-cprofileard-meta">
                        <span style="color: #fff;">{{ $mitra->email ?? 'manbahidayatulmaarif01@gmail.com' }}</span>
                        <span class="sep" style="color: #fff;"> | </span>
                        <span style="color: #fff;">{{ $mitra->telepon ?? '08998454419' }}</span>
                        <span class="sep" style="color: #fff;"> | </span>
                        <span class="badge-verified">Terverifikasi</span>
                    </div>
                </div>
                <div class="profile-card-id">
                    <span>ID Mitra : {{ $mitra->id_mitra ?? 'GTRQOV' }}
                        <span onclick="navigator.clipboard.writeText('{{ $mitra->id_mitra ?? 'GTRQOV' }}')" title="Salin ID"
                            style="cursor:pointer;display:inline-flex;align-items:center;vertical-align:-2px;">
                            <svg class="ms-1" xmlns="http://www.w3.org/2000/svg"
                                style="width: 14px; height: 14px; color: #ffffff;" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M15.988 3.012A2.25 2.25 0 0 1 18 5.25v6.5A2.25 2.25 0 0 1 15.75 14H13.5v-3.379a3 3 0 0 0-.879-2.121l-3.12-3.121a3 3 0 0 0-1.402-.791 2.252 2.252 0 0 1 1.913-1.576A2.25 2.25 0 0 1 12.25 1h1.5a2.25 2.25 0 0 1 2.238 2.012ZM11.5 3.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v.25h-3v-.25Z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M3.5 6A1.5 1.5 0 0 0 2 7.5v9A1.5 1.5 0 0 0 3.5 18h7a1.5 1.5 0 0 0 1.5-1.5v-5.879a1.5 1.5 0 0 0-.44-1.06L8.44 6.439A1.5 1.5 0 0 0 7.378 6H3.5Z">
                                </path>
                            </svg>
                        </span>
                    </span>
                    <strong>{{ $mitra->nomor ?? '1306250071621' }}</strong>
                </div>
            </div>

            {{-- Info Alert --}}
            <div class="info-alert" id="infoAlert">
                <div style="vertical-align: middle; ">
                    <svg class="h-8 w-8 text-[#1F1F1F]" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                        style="width: 36px; height: 36px;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <strong>Terverifikasi</strong> = Mitra telah lulus proses verifikasi data legal dan dapat mengajukan
                    <strong>SPPG</strong>. Data legal yang telah diverifikasi <strong>tidak dapat diubah</strong> oleh
                    Mitra.
                </div>
                <button class="close-btn" onclick="document.getElementById('infoAlert').style.display='none'">
                    <i class="bi bi-x"></i>
                </button>
            </div>

            {{-- Tabs --}}
            <div class="nav-tabs-scroll-wrapper"
                style="overflow-x: auto; white-space: nowrap; border-bottom: 2px solid #e5e7eb; margin-bottom:12px; position:relative;">
                <div class="nav-tabs-custom" role="tablist" style="min-width:1900px;display:inline-flex;gap:4px;">
                    <button class="nav-link active" onclick="switchTab(this,'umum')"
                        style="white-space:nowrap;"><strong>Umum</strong></button>
                    <button class="nav-link" onclick="switchTab(this,'legal')"
                        style="white-space:nowrap;"><strong>Legal</strong></button>
                    <button class="nav-link" onclick="switchTab(this,'keuangan')"
                        style="white-space:nowrap;"><strong>Keuangan</strong></button>
                    <button class="nav-link" onclick="switchTab(this,'calon-sppg')"
                        style="white-space:nowrap;"><strong>Calon SPPG <span class="tab-badge">1</span></strong></button>
                    <button class="nav-link" onclick="switchTab(this,'calon-sppg-mitra')"
                        style="white-space:nowrap;"><strong>Calon SPPG Mitra <span
                                class="tab-badge">0</span></strong></button>
                    <button class="nav-link" onclick="switchTab(this,'perwakilan')"
                        style="white-space:nowrap;"><strong>Perwakilan Yayasan <span
                                class="tab-badge">1</span></strong></button>
                    <button class="nav-link" onclick="switchTab(this,'riwayat')" style="white-space:nowrap;"><strong>Riwayat
                            Verifikasi Email <span class="tab-badge">0</span></strong></button>
                </div>
                <div
                    style="position:absolute;left:0;right:0;bottom:0;height:2px;background:#fcfcfc;z-index:1;pointer-events:none;">
                </div>
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
                            <label class="form-label" style="font-weight:500;">Email<span
                                    class="required">*</span></label>
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
                        <div style="display: flex; justify-content: flex-end;">
                            <button type="button"
                                style="
        margin-top:8px;
        background:#f9fafb;
        color:#9ca3af;
        border:1.5px solid #e5e7eb;
        border-radius:10px;
        padding:9px 20px;
        font-size:14px;
        font-weight:400;
        cursor:pointer;
        display:inline-flex;
        align-items:center;
        gap:8px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.04);
    ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="3.5" />
                                    <line x1="12" y1="8" x2="12" y2="16" />
                                    <line x1="8" y1="12" x2="16" y2="12" />
                                </svg>
                                Simpan
                            </button>
                        </div>
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

                        <div style="display: flex; justify-content: flex-end;">
                            <button type="button"
                                style="
        margin-top:8px;
        background:#f9fafb;
        color:#9ca3af;
        border:1.5px solid #e5e7eb;
        border-radius:10px;
        padding:9px 20px;
        font-size:14px;
        font-weight:400;
        cursor:pointer;
        display:inline-flex;
        align-items:center;
        gap:8px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.04);
    ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="3.5" />
                                    <line x1="12" y1="8" x2="12" y2="16" />
                                    <line x1="8" y1="12" x2="16" y2="12" />
                                </svg>
                                Simpan
                            </button>
                        </div>
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
                            {{-- <table style="width:100%;border-collapse:collapse;font-size:14px;background:#fff;">
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
                            </table> --}}

                        </div>
                    </div>
                </div>
            </div>

            <div id="tab-calon-sppg" class="tab-pane">
                <div class="section-card" style="padding: 20px 20px 8px 20px;">
                    <!-- HEADER -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                        <div class="section-title" style="margin: 0;">Calon Lokasi SPPG</div>
                        <button
                            style="background: #263882; color: #fff; border: none; border-radius: 6px; font-size: 14px; padding: 8px 18px; display: flex; align-items: center; gap: 6px; cursor: pointer;"
                            onclick="document.getElementById('confirmationModal').style.display='block';">
                            <i class="bi bi-plus" style="font-size: 16px; margin-right:4px;"></i> Ajukan Lokasi Baru
                        </button>
                    </div>
                    <!-- FILTER ROW -->
                    <div
                        style="display: flex; justify-content: space-between; align-items: end; flex-wrap: wrap; margin-bottom: 18px;">
                        <div style="flex: 1 1 300px; max-width: 340px;">
                            <label
                                style="font-size: 13px; font-weight:600; color: #424242; display:block; margin-bottom: 7px;">Filter</label>
                            <div style="display: flex; gap: 10px;">
                                <div style="flex: 1;">
                                    <label
                                        style="font-size: 13px; color: #393939; margin-bottom: 4px; display:block;">Status</label>
                                    <select
                                        style="width: 100%; padding: 6px 10px; font-size: 14px; border: 1.5px solid #E5E7EB; background: #FAFAFA; border-radius: 5px; outline: none;">
                                        <option>Semua</option>
                                        <option>Aktif</option>
                                        <option>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex; align-items: flex-end; gap: 14px; min-width: 250px; margin-left: auto;">
                            <div style="flex:1">
                                <label for="cari-calon-sppg"
                                    style="font-size: 13px; color:#434343; margin-bottom: 4px;display:block;"> </label>
                                <input id="cari-calon-sppg" type="text" class="form-control" placeholder="Cari"
                                    style="padding:6px 10px;font-size:14px;border:1.5px solid #E5E7EB;background:#FAFAFA;border-radius:5px;width:180px;">
                            </div>
                            <div style="text-align:right; min-width:105px;">
                                <a href="#"
                                    style="color:#EB5757;font-size:12px;text-decoration:none;font-weight:600;">Atur ulang
                                    filter</a>
                            </div>
                        </div>
                    </div>
                    <!-- TABLE -->
                    <div style="overflow-x: auto;">
                        <table
                            style="width:100%;border-collapse:collapse;font-size:14px;background:#fff;min-width:1200px;">
                            <thead>
                                <tr style="background:#FAFAFA;">
                                    <th
                                        style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;min-width:85px;">
                                        Status</th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">ID SPPG
                                    </th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">Provinsi
                                    </th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Kota/Kabupaten</th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Kecamatan</th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">
                                        Kelurahan/Desa</th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">Luas
                                        Lahan</th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">Luas
                                        Bangunan</th>
                                    <th style="padding:10px 12px;font-weight:500;border-bottom:1px solid #ECECEC;">Kesiapan
                                        SPPG</th>
                                    <th style="padding:10px 12px;border-bottom:1px solid #ECECEC;"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:10px 12px;">
                                        <span
                                            style="background:#F3F7FF;color:#4767DA;font-size:13px;border-radius:4px;padding:3px 12px;font-weight:500;">
                                            Proses Persiapan
                                        </span>
                                    </td>
                                    <td style="padding:10px 12px;">B2GCL2GS</td>
                                    <td style="padding:10px 12px;">JAWA BARAT</td>
                                    <td style="padding:10px 12px;">KAB. BOGOR</td>
                                    <td style="padding:10px 12px;">BOJONG GEDE</td>
                                    <td style="padding:10px 12px;">RAGAJAYA</td>
                                    <td style="padding:10px 12px;">300 m2</td>
                                    <td style="padding:10px 12px;">300 m2</td>
                                    <td style="padding:10px 12px;">-</td>
                                    <td style="padding:10px 12px; position:relative;">
                                        <div class="dropdown" style="display:inline-block;position:relative;">
                                            <button class="dropdown-toggle"
                                                style="background:#fff;border:1px solid #DFE4EA;border-radius:4px;padding:4px 10px;cursor:pointer;font-size:13px;font-weight:500;color:#526087;min-width:30px;display:inline-flex;align-items:center;gap:4px;">
                                                <i class="bi bi-list"></i>
                                            </button>
                                            <div class="dropdown-menu"
                                                style="display:none;position:absolute;top:100%;right:0;min-width:165px;background:#fff;box-shadow:0 2px 16px #0002;border-radius:8px;z-index:9;padding:7px 0;">
                                                <a href="#"
                                                    style="display:block;padding:7px 18px;color:#263882;text-decoration:none;font-size:12.5px;">Ajukan
                                                    Proposal</a>
                                                <a href="#"
                                                    style="display:block;padding:7px 18px;color:#263882;text-decoration:none;font-size:12.5px;">Upload
                                                    Dokumen</a>
                                                <a href="#"
                                                    style="display:block;padding:7px 18px;color:#263882;text-decoration:none;font-size:12.5px;">Peninjauan
                                                    Lokasi</a>
                                                <a href="#"
                                                    style="display:block;padding:7px 18px;color:#263882;text-decoration:none;font-size:12.5px;">Unduh
                                                    Proposal</a>
                                                <a href="#"
                                                    style="display:block;padding:7px 18px;color:#263882;text-decoration:none;font-size:12.5px;">Penetapan
                                                    Kesiapan</a>
                                                <a href="#"
                                                    style="display:block;padding:7px 18px;color:#263882;text-decoration:none;font-size:12.5px;">Penetapan
                                                    Status</a>
                                            </div>
                                        </div>
                                        <script>
                                            // Basic dropdown show/hide
                                            document.querySelectorAll('.dropdown-toggle').forEach(function(btn) {
                                                btn.addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                    document.querySelectorAll('.dropdown-menu').forEach(el => el.style.display = 'none');
                                                    var menu = btn.parentElement.querySelector('.dropdown-menu');
                                                    if (menu) menu.style.display = (menu.style.display !== 'block' ? 'block' : 'none');
                                                })
                                            });
                                            document.addEventListener('click', function() {
                                                document.querySelectorAll('.dropdown-menu').forEach(el => el.style.display = 'none');
                                            });
                                        </script>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div
                            style="font-size:12.5px; color:#7B7B7B; margin:18px 2px 8px 2px; display:flex; align-items:center; justify-content:space-between;">
                            <div>Menampilkan 1 sampai 1 dari 1 hasil</div>
                            <div>
                                <select
                                    style="padding:2px 11px;font-size:13px;border:1px solid #ECECEC;background:#FBFBFB;border-radius:4px;">
                                    <option>per halaman</option>
                                    <option selected>10</option>
                                    <option>20</option>
                                    <tr style="background: #FAFAFA;">
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Status</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            ID SPPG</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Provinsi</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Kota/Kabupaten</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Kecamatan</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Kelurahan/Desa</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Luas Lahan</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Luas Bangunan</th>
                                        <th
                                            style="padding: 10px 12px; font-weight: 500; border-bottom: 1px solid #ECECEC;">
                                            Kesiapan SPPG</th>
                                        <th style="padding: 10px 12px; border-bottom: 1px solid #ECECEC;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 10px 12px;">
                                                <span
                                                    style="background: #F3F7FF; color: #4767DA; font-size: 13px; border-radius: 4px; padding: 3px 10px; font-weight: 500;">
                                                    Proses Persiapan
                                                </span>
                                            </td>
                                            <td style="padding: 10px 12px;">B2GCL2GS</td>
                                            <td style="padding: 10px 12px;">JAWA BARAT</td>
                                            <td style="padding: 10px 12px;">KAB. BOGOR</td>
                                            <td style="padding: 10px 12px;">BOJONG GEDE</td>
                                            <td style="padding: 10px 12px;">RAGAJAYA</td>
                                            <td style="padding: 10px 12px;">300 m2</td>
                                            <td style="padding: 10px 12px;">300 m2</td>
                                            <td style="padding: 10px 12px;">-</td>
                                            <td style="padding: 10px 12px;"></td>
                                        </tr>
                                    </tbody>
                                    </table>
                            </div>

                        </div> --}}
                    </div>

                    <div id="tab-calon-sppg-mitra" class="tab-pane">
                        <div class="section-card">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
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
                                            <i class="bi bi-exclamation-triangle"
                                                style="font-size: 42px; color:#FF885A;"></i>
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
                            <div
                                style="margin-bottom:24px; display:flex; justify-content:space-between; align-items:center;">
                                <div class="section-title" style="margin:0;">Perwakilan Yayasan</div>
                                <button
                                    style="background: #173A63; color: #fff; border: none; border-radius: 6px; font-size: 14px; padding: 8px 18px; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                    <i class="bi bi-plus" style="font-size: 16px;"></i> Tambah Perwakilan Yayasan
                                </button>
                            </div>
                            <div
                                style="background: #fff; border-radius: 10px; box-shadow: 0 1px 4px rgba(0,0,0,0.02); padding: 20px; overflow-x: auto;">
                                <div
                                    style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
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
