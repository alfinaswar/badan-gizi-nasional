<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kode Verifikasi</title>
    <style>
        body {
            background: #232127;
            color: #fff;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
            margin: 0;
        }

        .otp-email-container {
            max-width: 410px;
            margin: 40px auto;
            background: #232127;
            border-radius: 14px;
            padding: 32px 28px 18px 28px;
            box-sizing: border-box;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.13);
            color: #fff;
        }

        .otp-title {
            font-size: 1.7em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }

        .otp-greeting {
            margin-bottom: 5px;
            font-size: 1.06em;
            color: #fff;
        }

        .otp-explain {
            margin-bottom: 11px;
            font-size: 1.06em;
            color: #fff;
        }

        .otp-code-box {
            margin: 10px 0 18px 0;
            background: #343139;
            color: #fff;
            border-radius: 8px;
            display: inline-block;
            padding: 12px 28px;
            font-size: 2em;
            letter-spacing: 10px;
            font-weight: bold;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
        }

        .otp-validity {
            margin-bottom: 11px;
            color: #fff;
            font-size: 1em;
        }

        .otp-info {
            color: #fff;
            font-size: 1em;
            margin-bottom: 25px;
        }

        .otp-signature {
            margin: 25px 0 20px 0;
            color: #fff;
        }

        .otp-signature b {
            font-weight: bold;
            color: #fff;
        }

        .otp-signature-lines {
            margin-top: 2px;
            margin-bottom: 15px;
            line-height: 1.32;
            color: #fff;
        }

        .otp-footer {
            color: #fff;
            font-size: 0.93em;
            margin-top: 20px;
        }

        .otp-datetime {
            color: #fff;
            font-size: 0.97em;
            margin-top: 18px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="otp-email-container">
        <div class="otp-title">Kode Verifikasi</div>

        <div class="otp-greeting">
            Yth. {{ $name ?? 'Pengguna' }},
        </div>

        <div class="otp-explain">
            OTP Anda adalah
        </div>

        <div class="otp-code-box">
            {{ $otp }}
        </div>

        <div class="otp-validity">
            Berakhir dalam 10 menit
        </div>
        <div class="otp-info">
            Jika Anda tidak meminta kode ini, abaikan email ini.
        </div>

        <div class="otp-signature">
            <b>Hormat kami,</b>
            <div class="otp-signature-lines">
                Tim Layanan Mitra<br>
                Badan Gizi Nasional
            </div>
        </div>

        <div class="otp-footer">
            Email ini dikirim secara otomatis. Mohon tidak membalas email ini.
        </div>
        <div class="otp-datetime">
            {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}
        </div>
    </div>
</body>

</html>
