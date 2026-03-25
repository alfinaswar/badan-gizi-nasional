<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f0f2f5;
        font-family: 'Plus Jakarta Sans', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .login-wrapper {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
    }

    .login-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 48px 56px;
        width: 100%;
        max-width: 480px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
    }

    .login-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 28px;
    }

    .login-logo img {
        width: 136px;
        height: 56px;
        object-fit: contain;
    }

    .login-logo-text {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
    }

    .login-logo-text span {
        font-size: 14px;
        font-weight: 700;
        color: #1a2a4a;
        letter-spacing: 0.04em;
    }

    .login-title {
        text-align: center;
        font-size: 22px;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 32px;
        letter-spacing: -0.2px;
        font-weight: 700;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 13.5px;
        font-weight: 500;
        color: #374151;
        margin-bottom: 7px;
    }

    .form-label .required {
        color: #ef4444;
        margin-left: 2px;
    }

    .input-wrapper {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #111827;
        background: #fff;
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
        appearance: none;
    }

    .form-control:focus {
        border-color: #1a2a4a;
        box-shadow: 0 0 0 3px rgba(26, 42, 74, 0.08);
    }

    .form-control.is-invalid {
        border-color: #ef4444;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .invalid-feedback {
        display: block;
        font-size: 12px;
        color: #ef4444;
        margin-top: 5px;
    }

    .password-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 7px;
    }

    .forgot-link {
        font-size: 13px;
        font-weight: 600;
        color: #1606ff;
        text-decoration: none;
        transition: color 0.15s;
    }

    .forgot-link:hover {
        color: #1606ff;
        text-decoration: underline;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: #9ca3af;
        padding: 2px;
        display: flex;
        align-items: center;
        transition: color 0.15s;
    }

    .toggle-password:hover {
        color: #4b5563;
    }

    .form-control.has-toggle {
        padding-right: 42px;
    }

    .captcha-box {
        border: 1.5px solid #d1d5db;
        border-radius: 8px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        background: #fafafa;
    }

    .captcha-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .captcha-check {
        width: 24px;
        height: 24px;
        background: #16a34a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .captcha-check svg {
        width: 14px;
        height: 14px;
        color: #fff;
    }

    .captcha-text {
        font-size: 14px;
        color: #374151;
        font-weight: 500;
    }

    .captcha-logo {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 2px;
    }

    .captcha-logo-icon {
        width: 36px;
        height: 22px;
        object-fit: contain;
    }

    .captcha-links {
        font-size: 10px;
        color: #9ca3af;
    }

    .captcha-links a {
        color: #9ca3af;
        text-decoration: none;
    }

    .captcha-links a:hover {
        text-decoration: underline;
    }

    .remember-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
    }

    .remember-row input[type="checkbox"] {
        width: 16px;
        height: 16px;
        border: 1.5px solid #d1d5db;
        border-radius: 4px;
        accent-color: #1a2a4a;
        cursor: pointer;
        flex-shrink: 0;
    }

    .remember-row label {
        font-size: 14px;
        color: #374151;
        cursor: pointer;
        user-select: none;
    }

    .btn-login {
        width: 100%;
        padding: 11px;
        background: #ffffff;
        color: #111827;
        border: 1.5px solid #1a1a2e;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        transition: background 0.18s, color 0.18s, transform 0.12s;
        letter-spacing: 0.01em;
        margin-bottom: 18px;
    }

    .btn-login:hover {
        background: #1a1a2e;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .register-link {
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        color: #1a2a4a;
        text-decoration: none;
        display: block;
        transition: color 0.15s;
    }

    .register-link:hover {
        color: #b45309;
        text-decoration: underline;
    }

    .footer-copyright {
        text-align: right;
        padding: 16px 24px;
        font-size: 12px;
        color: #9ca3af;
        background-color: white;
    }

    /* Alert errors */
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 13px;
        color: #dc2626;
        margin-bottom: 20px;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        {{-- Logo --}}
        <div class="login-logo">
            <img src="{{ asset('icon/BGN_LOGO.png') }}" alt="Badan Gizi Nasional"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
        </div>

        <h1 class="login-title">Masuk ke akun Anda</h1>

        {{-- Session / Validation Errors --}}
        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="email" class="form-label">
                    Alamat email<span class="required">*</span>
                </label>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                    autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <div class="password-group">
                    <label for="password" class="form-label" style="margin-bottom:0;">
                        Kata sandi<span class="required">*</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a>
                    @endif
                </div>
                <div class="input-wrapper">
                    <input id="password" type="password" name="password"
                        class="form-control has-toggle @error('password') is-invalid @enderror" required
                        autocomplete="current-password">
                    <button type="button" class="toggle-password" onclick="togglePassword()"
                        aria-label="Toggle password visibility">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                            <line x1="1" y1="1" x2="23" y2="23" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Cloudflare Turnstile / CAPTCHA placeholder --}}
            {{-- <div class="captcha-box">
                <div class="captcha-left">
                    <div class="captcha-check">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white"
                            stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="captcha-text">Berhasil!</span>
                </div>
                <div class="captcha-logo">
                    <svg width="72" height="22" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0" y="10" width="48" height="38" rx="8" fill="#F6821F" />
                        <ellipse cx="24" cy="29" rx="18" ry="10" fill="#FBAD41" />
                        <ellipse cx="24" cy="31" rx="18" ry="8" fill="#F6821F" />
                        <text x="56" y="36" font-family="Arial" font-weight="bold" font-size="22"
                            fill="#404040">CLOUDFLARE</text>
                    </svg>
                    <span class="captcha-links">
                        <a href="#">Privasi</a> · <a href="#">Bantuan</a>
                    </span>
                </div>
            </div> --}}

            {{-- Remember Me --}}
            <div class="remember-row">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Ingat saya</label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login">Masuk</button>

        </form>

        {{-- Register --}}
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="register-link">Buat Akun Baru</a>
        @endif

    </div>
</div>

<div class="footer-copyright">
    © {{ date('Y') }} Badan Gizi Nasional (BGN). All Rights Reserved.
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eye-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            `;
        } else {
            input.type = 'password';
            icon.innerHTML = `
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
            `;
        }
    }
</script>
