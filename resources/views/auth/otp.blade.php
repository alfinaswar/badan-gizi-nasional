<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f0f2f5;
        margin: 0;
    }

    .otp-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
    }

    .otp-card {
        background: #fff;
        border-radius: 16px;
        padding: 44px 48px;
        width: 100%;
        max-width: 460px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.07);
    }

    /* Logo */
    .otp-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 24px;
    }

    .otp-logo img {
        width: 134px;
        height: 54px;
        object-fit: contain;
    }

    .otp-logo-text {
        font-size: 14px;
        font-weight: 700;
        color: #1a2a4a;
        letter-spacing: 0.05em;
        line-height: 1.3;
    }

    /* Title */
    .otp-title {
        text-align: center;
        font-size: 22px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 20px;
        letter-spacing: -0.3px;
    }

    /* Info box */
    .otp-info {
        background: #e8f5e9;
        border-radius: 10px;
        padding: 14px 20px;
        text-align: center;
        font-size: 14px;
        color: #374151;
        line-height: 1.6;
        margin-bottom: 24px;
    }

    /* OTP field */
    .otp-field-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 7px;
    }

    .otp-label {
        font-size: 13.5px;
        font-weight: 600;
        color: #374151;
    }

    .otp-label .req {
        color: #ef4444;
    }

    .otp-resend {
        font-size: 13px;
        color: #6b7280;
    }

    .otp-resend a {
        color: #1a2a4a;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }

    .otp-resend a:hover {
        text-decoration: underline;
    }

    .otp-input {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid #d1d5db;
        border-radius: 8px;
        font-size: 15px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #111827;
        letter-spacing: 4px;
        background: #fff;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        margin-bottom: 20px;
    }

    .otp-input::placeholder {
        letter-spacing: 2px;
        color: #d1d5db;
        font-size: 14px;
    }

    .otp-input:focus {
        border-color: #1a2a4a;
        box-shadow: 0 0 0 3px rgba(26, 42, 74, 0.08);
    }

    .otp-input.is-invalid {
        border-color: #ef4444;
    }

    .invalid-feedback {
        display: block;
        font-size: 12px;
        color: #ef4444;
        margin-top: -14px;
        margin-bottom: 14px;
    }

    /* Trust device */
    .trust-label {
        font-size: 13.5px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 10px;
    }

    .trust-label .req {
        color: #ef4444;
    }

    .radio-group {
        margin-bottom: 24px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .radio-option input[type="radio"] {
        width: 18px;
        height: 18px;
        accent-color: #0f1f3d;
        cursor: pointer;
        flex-shrink: 0;
    }

    .radio-option span {
        font-size: 14px;
        color: #374151;
        font-weight: 500;
    }

    /* Buttons */
    .otp-btn-row {
        display: flex;
        gap: 12px;
    }

    .btn-verify {
        flex: 1;
        padding: 12px;
        background: #0f1f3d;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        transition: background 0.18s, transform 0.12s;
        letter-spacing: 0.01em;
    }

    .btn-verify:hover {
        background: #1a3060;
        transform: translateY(-1px);
    }

    .btn-verify:active {
        transform: translateY(0);
    }

    .btn-cancel {
        flex: 1;
        padding: 12px;
        background: #dc2626;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        transition: background 0.18s, transform 0.12s;
        letter-spacing: 0.01em;
        text-decoration: none;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-cancel:hover {
        background: #b91c1c;
        transform: translateY(-1px);
        color: #fff;
    }

    .btn-cancel:active {
        transform: translateY(0);
    }

    /* Alert errors */
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 13px;
        color: #dc2626;
        margin-bottom: 16px;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .otp-card {
            padding: 32px 24px;
        }

        .otp-title {
            font-size: 19px;
        }

        .otp-btn-row {
            flex-direction: column;
        }
    }
</style>

<div class="otp-wrapper">
    <div class="otp-card">

        {{-- Logo --}}
        <div class="otp-logo">
            <img src="{{ asset('icon/BGN_LOGO.png') }}" alt="BGN" onerror="this.style.display='none'">
            {{-- <div class="otp-logo-text">
                <div>BADAN</div>
                <div>GIZI</div>
                <div>NASIONAL</div>
            </div> --}}
        </div>

        {{-- Title --}}
        <h1 class="otp-title">Authentikasi Dua Faktor</h1>

        {{-- Info --}}
        <div class="otp-info">
            Kode OTP telah dikirim ke email<br>
            <strong>{{ session('otp_email') ?? (auth()->user()->email ?? 'manbahidayatulmaarif01@gmail.com') }}</strong>
        </div>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            {{-- OTP Input --}}
            <div class="otp-field-row">
                <label for="otp" class="otp-label">Kode OTP<span class="req">*</span></label>
                <div class="otp-resend" id="resendWrapper">
                    <span id="resendTimer">Bisa kirim ulang dalam <span id="countdown">59</span> detik</span>
                    <a href="" id="resendLink" style="display:none;">Kirim ulang OTP</a>
                </div>
            </div>

            <input type="text" id="otp" name="otp" class="otp-input @error('otp') is-invalid @enderror"
                maxlength="6" placeholder="XXXXXX" autocomplete="one-time-code" inputmode="numeric" autofocus
                value="{{ old('otp') }}">

            @error('otp')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            {{-- Trust Device --}}
            <div class="trust-label">Percayai Perangkat Ini<span class="req">*</span></div>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="trust_device" value="1"
                        {{ old('trust_device', '1') == '1' ? 'checked' : '' }}>
                    <span>Ya</span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="trust_device" value="0"
                        {{ old('trust_device') == '0' ? 'checked' : '' }}>
                    <span>Tidak</span>
                </label>
            </div>

            {{-- Buttons --}}
            <div class="otp-btn-row">
                <button type="submit" class="btn-verify">Verifikasi</button>
                <a href="{{ route('login') }}" class="btn-cancel">Batalkan</a>
            </div>

        </form>
    </div>
</div>

<script>
    // Countdown timer for resend OTP
    let seconds = 59;
    const countdownEl = document.getElementById('countdown');
    const timerEl = document.getElementById('resendTimer');
    const linkEl = document.getElementById('resendLink');

    const interval = setInterval(() => {
        seconds--;
        if (seconds <= 0) {
            clearInterval(interval);
            timerEl.style.display = 'none';
            linkEl.style.display = 'inline';
        } else {
            countdownEl.textContent = seconds;
        }
    }, 1000);

    // Remove auto-submit on 6 digits input.
    document.getElementById('otp').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '');
        // Tidak melakukan auto-submit, hanya validasi angka saja sekarang
    });
</script>
