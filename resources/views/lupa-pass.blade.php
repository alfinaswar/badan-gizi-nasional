<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f0f2f5;
        margin: 0;
    }

    .forgot-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
    }

    .forgot-card {
        background: #fff;
        border-radius: 16px;
        padding: 44px 48px;
        width: 100%;
        max-width: 440px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.07);
    }

    /* Logo */
    .forgot-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 24px;
    }

    .forgot-logo img {
        width: 154px;
        height: 54px;
        object-fit: contain;
    }

    .forgot-logo-text {
        font-size: 14px;
        font-weight: 700;
        color: #1a2a4a;
        letter-spacing: 0.05em;
        line-height: 1.3;
    }

    /* Title */
    .forgot-title {
        text-align: center;
        font-size: 22px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 10px;
        letter-spacing: -0.3px;
    }

    /* Back link */
    .forgot-back {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-size: 13.5px;
        font-weight: 600;
        color: #1a2a4a;
        text-decoration: none;
        margin-bottom: 28px;
        transition: color 0.15s;
    }

    .forgot-back:hover {
        color: #b45309;
    }

    .forgot-back i {
        font-size: 14px;
    }

    /* Field */
    .form-group {
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        font-size: 13.5px;
        font-weight: 500;
        color: #374151;
        margin-bottom: 7px;
    }

    .form-label .req {
        color: #ef4444;
    }

    .form-control {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #111827;
        background: #fff;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box;
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

    /* Submit button */
    .btn-submit {
        width: 100%;
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
        margin-top: 4px;
    }

    .btn-submit:hover {
        background: #1a3060;
        transform: translateY(-1px);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* Success alert */
    .alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 13.5px;
        color: #15803d;
        margin-bottom: 16px;
    }

    /* Error alert */
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 13px;
        color: #dc2626;
        margin-bottom: 16px;
    }

    @media (max-width: 480px) {
        .forgot-card {
            padding: 32px 24px;
        }

        .forgot-title {
            font-size: 19px;
        }
    }

    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 14px 16px;
        min-width: 300px;
        display: none;
        z-index: 9999;
        animation: slideIn 0.3s ease;
    }

    .toast-content {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .toast-icon {
        color: #22c55e;
        font-weight: bold;
        font-size: 18px;
    }

    .toast-close {
        margin-left: auto;
        cursor: pointer;
        font-weight: bold;
        color: #999;
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>
<div id="toast" class="toast">
    <div class="toast-content">
        <span class="toast-icon">✔</span>
        <span id="toast-text">
            <!-- Akan diisi via JS -->
        </span>
        <span class="toast-close" onclick="hideToast()">×</span>
    </div>
</div>

<div class="forgot-wrapper">
    <div class="forgot-card">

        {{-- Logo --}}
        <div class="forgot-logo">
            <img src="{{ asset('icon/BGN_LOGO.png') }}" alt="BGN" onerror="this.style.display='none'">

        </div>

        {{-- Title --}}
        <h1 class="forgot-title">Lupa kata sandi?</h1>

        {{-- Back link --}}
        <a href="{{ route('login') }}" class="forgot-back">
            <i class="bi bi-arrow-left"></i> Kembali ke halaman masuk
        </a>

        {{-- Alerts --}}
        @if (session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="#" onsubmit="event.preventDefault(); handleForgotPasswordSubmit();">

            @csrf

            <div class="form-group">
                <label for="email" class="form-label">
                    Alamat email<span class="req">*</span>
                </label>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                    autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-submit">Kirim email</button>
        </form>

    </div>
</div>


<script>
    function showToast(message) {
        const toast = document.getElementById('toast');
        const text = document.getElementById('toast-text');

        text.innerText = message;
        toast.style.display = 'block';

        setTimeout(() => {
            toast.style.display = 'none';
        }, 4000);
    }

    function hideToast() {
        document.getElementById('toast').style.display = 'none';
    }

    function handleForgotPasswordSubmit() {
        const emailInput = document.getElementById('email');
        const email = emailInput.value || '';
        const toastMessage = `Link Reset Password Telah Dikirim ke Email ${email}`;
        showToast(toastMessage);
    }
</script>
