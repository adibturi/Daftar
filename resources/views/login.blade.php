<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .back-link {
            position: absolute;
            top: 10px;
            left: 0;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: blue;
            font-size: 25px;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .login-container img {
            width: 100px;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-button {
            background-color: green;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-button:disabled {
            background-color: #ddd;
        }

        .warning-message {
            background-color: #ffeb3b;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="back-link">
        <a href="/">← Kembali ke Beranda</a>
    </div>
    <div class="login-container">
        <img src="https://smaspgri1kotabekasi.sch.id/logo-sma.png" alt="" width="80">
        <h2>Masuk</h2>
        <div class="warning-message">
            Untuk meningkatkan keamanan akun, mohon ubah kata sandi Anda secara berkala.
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username"><b>Email</b></label>
                <input type="text" name="email" id="username" placeholder="nama@email.com" required>
            </div>
            <div class="form-group">
                <label for="password"><b>Kata Sandi</b></label>
                <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" required>
            </div>
            <button type="submit" class="login-button">Masuk</button>
        </form>
    </div>

    <!-- Tambahkan JS Toastr dan jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Script untuk menampilkan Toastr jika ada pesan error -->
    <script>
        @if ($errors->has('login_error'))
            toastr.error("{{ $errors->first('login_error') }}", "Login Gagal", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right"
            });
        @endif
          // Notifikasi untuk login success
          @if (session('successs'))
            toastr.success("{{ session('successs') }}", "Login Berhasil", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right"
            });
        @endif
        @if (session('success'))
            toastr.success("{{ session('success') }}", "Log out Berhasil", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right"
            });
        @endif
    </script>
</body>
</html>
