@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        html,
        body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .profil-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 36px 40px 0;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        /* ── Title ── */
        .profil-title {
            font-size: 28px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 32px;
        }

        /* ── Row: label + input ── */
        .profil-row {
            display: grid;
            grid-template-columns: 140px 1fr;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .profil-row.top {
            align-items: flex-start;
        }

        .profil-label {
            font-size: 14.5px;
            font-weight: 500;
            color: #111827;
        }

        /* ── Logo upload ── */
        .logo-upload-wrap {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .logo-circle {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid #e5e9ef;
            overflow: hidden;
            background: #f0f2f5;
            flex-shrink: 0;
            cursor: pointer;
        }

        .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .logo-remove-btn {
            position: absolute;
            bottom: 6px;
            right: 6px;
            width: 26px;
            height: 26px;
            background: rgba(30, 30, 30, 0.75);
            border: none;
            border-radius: 50%;
            color: #fff;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.15s;
            z-index: 2;
        }

        .logo-remove-btn:hover {
            background: #dc2626;
        }

        /* ── Text input ── */
        .profil-input {
            width: 100%;
            padding: 11px 16px;
            border: 1.5px solid #e5e9ef;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #111827;
            background: #fff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }

        .profil-input:focus {
            border-color: #1a2a4a;
            box-shadow: 0 0 0 3px rgba(26, 42, 74, 0.08);
        }

        .profil-input.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            display: block;
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
        }

        /* ── Password section card ── */
        .password-card {
            border: 1.5px solid #e5e9ef;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 28px;
            background: #fff;
        }

        .password-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid #e5e9ef;
        }

        .password-card-title {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }

        .btn-ubah-sandi {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
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
        }

        .btn-ubah-sandi:hover {
            background: #1a3060;
            color: #fff;
            transform: translateY(-1px);
        }

        .password-card-body {
            padding: 20px 20px;
        }

        .password-hint {
            font-size: 14px;
            color: #9ca3af;
        }

        /* Password fields (hidden by default) */
        .password-fields {
            display: none;
        }

        .password-fields.show {
            display: block;
        }

        .pw-field-group {
            margin-bottom: 16px;
        }

        .pw-label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
            display: block;
        }

        /* ── Action buttons ── */
        .profil-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .btn-simpan {
            padding: 11px 28px;
            background: #0f1f3d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: background 0.15s, transform 0.12s;
        }

        .btn-simpan:hover {
            background: #1a3060;
            transform: translateY(-1px);
        }

        .btn-kembali {
            padding: 11px 28px;
            background: #fff;
            color: #111827;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: border-color 0.15s, background 0.15s;
        }

        .btn-kembali:hover {
            border-color: #1a2a4a;
            background: #f8faff;
            color: #1a2a4a;
        }

        /* ── Spacer + Footer ── */
        .profil-spacer {
            flex: 1;
        }

        .profil-footer {
            text-align: right;
            padding: 14px 0;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e5e9ef;
        }

        /* ── Alert ── */
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 13.5px;
            color: #15803d;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 13px;
            color: #dc2626;
            margin-bottom: 20px;
        }

        /* ── Responsive ── */
        @media (max-width: 767px) {
            .profil-wrapper {
                padding: 24px 16px 0;
            }

            .profil-row {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .profil-title {
                font-size: 22px;
                margin-bottom: 24px;
            }

            .password-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .btn-ubah-sandi {
                width: 100%;
                justify-content: center;
            }

            .profil-actions {
                flex-direction: column;
            }

            .btn-simpan,
            .btn-kembali {
                width: 100%;
                justify-content: center;
                text-align: center;
            }
        }
    </style>

    <div class="profil-wrapper">

        <h1 class="profil-title">Profil</h1>

        @if (session('status') === 'profile-updated')
            <div class="alert-success">Profil berhasil diperbarui.</div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="#" enctype="multipart/form-data" id="profilForm">
            @csrf
            @method('PATCH')

            {{-- Logo --}}
            <div class="profil-row top">
                <div class="profil-label">Logo</div>
                <div class="logo-upload-wrap">
                    <div class="logo-circle" onclick="document.getElementById('logoInput').click()"
                        style="pointer-events: none; opacity: 0.6;">
                        <img id="logoPreview" src="{{ asset('icon/logo-yayasan.png.jpeg') }}" alt="Logo">

                        <button type="button" class="logo-remove-btn" id="logoRemoveBtn"
                            style="{{ auth()->user()->logo ? '' : 'display:none;' }}" disabled
                            onclick="event.stopPropagation(); removeLogo()">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <input type="file" id="logoInput" name="logo" accept="image/*" style="display:none;"
                        onchange="previewLogo(this)" disabled>
                    <input type="hidden" name="remove_logo" id="removeLogo" value="0" disabled>
                </div>
            </div>

            {{-- Nama --}}
            <div class="profil-row">
                <label for="nama" class="profil-label">Nama</label>
                <div>
                    <input type="text" id="nama" name="name"
                        class="profil-input @error('name') is-invalid @enderror"
                        value="{{ old('name', auth()->user()->name) }}" placeholder="Nama lengkap" disabled>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="profil-row">
                <label for="email" class="profil-label">Alamat email</label>
                <div>
                    <input type="email" id="email" name="email"
                        class="profil-input @error('email') is-invalid @enderror"
                        value="{{ old('email', auth()->user()->email) }}" placeholder="Alamat email" disabled>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Password Card --}}
            <div class="password-card" style="margin-top: 8px; opacity:0.6; pointer-events: none;">
                <div class="password-card-header">
                    <span class="password-card-title">Password</span>
                    <button type="button" class="btn-ubah-sandi" onclick="togglePassword()" disabled>
                        <i class="bi bi-key"></i> Ubah Kata Sandi
                    </button>
                </div>
                <div class="password-card-body">

                    {{-- Hint (shown when fields hidden) --}}
                    <div id="passwordHint" class="password-hint">Ubah kata sandi jika diperlukan</div>

                    {{-- Password fields (hidden by default) --}}
                    <div id="passwordFields" class="password-fields">
                        <div class="pw-field-group">
                            <label class="pw-label">Kata Sandi Saat Ini</label>
                            <input type="password" name="current_password"
                                class="profil-input @error('current_password') is-invalid @enderror" placeholder="••••••••"
                                autocomplete="current-password" disabled>
                            @error('current_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="pw-field-group">
                            <label class="pw-label">Kata Sandi Baru</label>
                            <input type="password" name="password"
                                class="profil-input @error('password') is-invalid @enderror" placeholder="••••••••"
                                autocomplete="new-password" disabled>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="pw-field-group" style="margin-bottom:0;">
                            <label class="pw-label">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="password_confirmation" class="profil-input" placeholder="••••••••"
                                autocomplete="new-password" disabled>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Actions --}}
            <div class="profil-actions">
                <button type="submit" class="btn-simpan" disabled>Simpan</button>
                <a href="{{ url()->previous() }}" class="btn-kembali" style="pointer-events: none; opacity:0.6;">Kembali</a>
            </div>

        </form>

        <div class="profil-spacer"></div>

        <footer class="profil-footer">
            © {{ date('Y') }} Badan Gizi Nasional (BGN). All Rights Reserved.
        </footer>

    </div>

    <script>
        // ── Logo preview ──
        function previewLogo(input) {
            if (!input.files || !input.files[0]) return;
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.getElementById('logoPreview');
                img.src = e.target.result;
                img.style.display = 'block';
                document.getElementById('logoPlaceholder').style.display = 'none';
                document.getElementById('logoRemoveBtn').style.display = 'flex';
                document.getElementById('removeLogo').value = '0';
            };
            reader.readAsDataURL(input.files[0]);
        }

        function removeLogo() {
            document.getElementById('logoPreview').style.display = 'none';
            document.getElementById('logoPlaceholder').style.display = 'flex';
            document.getElementById('logoRemoveBtn').style.display = 'none';
            document.getElementById('logoInput').value = '';
            document.getElementById('removeLogo').value = '1';
        }

        // ── Password toggle ──
        function togglePassword() {
            const fields = document.getElementById('passwordFields');
            const hint = document.getElementById('passwordHint');
            const isOpen = fields.classList.contains('show');
            fields.classList.toggle('show', !isOpen);
            hint.style.display = isOpen ? 'block' : 'none';
        }

        // Auto-open password section if there are validation errors
        @if ($errors->hasAny(['current_password', 'password']))
            togglePassword();
        @endif
    </script>

@endsection
