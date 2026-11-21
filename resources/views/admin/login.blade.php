<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Puding Calista</title>

    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fff7f7, #fff1f2, #fce7f3);
        }

        .login-container {
            width: 100%;
            max-width: 430px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
            color: #e11d48;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #be123c;
        }

        .login-card {
            padding: 38px 34px;
            background: #ffffff;
            border: 1px solid #ffe1e4;
            border-radius: 22px;
            box-shadow: 0 15px 40px rgba(159, 18, 57, 0.10);
        }

        .login-icon {
            width: 68px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border-radius: 20px;
            color: white;
            font-size: 30px;
            background: linear-gradient(135deg, #ff8fa3, #ff174d);
        }

        .login-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-heading h1 {
            color: #881337;
            font-size: 25px;
            margin-bottom: 9px;
        }

        .login-heading p {
            color: #78716c;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #44403c;
            font-size: 14px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #e7d5d0;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #ff174d;
            box-shadow: 0 0 0 3px rgba(255, 23, 77, 0.10);
        }

        .error-message {
            margin-top: 8px;
            color: #dc2626;
            font-size: 13px;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            color: white;
            background: linear-gradient(135deg, #ff8fa3, #ff174d);
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .login-footer {
            margin-top: 24px;
            color: #a8a29e;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 22px;
            }

            .login-heading h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <a href="{{ url('/') }}" class="back-link">
            ← Kembali ke Tampilan Pembeli
        </a>

        <div class="login-card">

            <div class="login-icon">
                🔒
            </div>

            <div class="login-heading">
                <h1>Login Admin</h1>
                <p>Masuk ke panel pengelolaan Puding Calista</p>
            </div>

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email Admin</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email admin"
                        required
                        autofocus
                    >

                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Masuk sebagai Admin
                </button>
            </form>

            <div class="login-footer">
                © {{ date('Y') }} Puding Calista
            </div>

        </div>
    </div>

</body>
</html>