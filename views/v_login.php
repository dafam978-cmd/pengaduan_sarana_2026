<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengaduan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body {
            /* Background dengan gradasi Hijau Deep Forest ke Hijau Lime */
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            background-image: url('https://images.unsplash.com/photo-1501004318641-b39e6451bec6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80'); /* Background Daun Estetik */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Overlay gelap agar teks terbaca */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(15, 32, 39, 0.7);
            z-index: 1;
        }

        .login-box {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
            padding: 50px;
            background: rgba(255, 255, 255, 0.1); /* Efek Kaca */
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            text-align: center;
            color: #fff;
        }

        .login-box h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 1px;
            background: linear-gradient(to right, #a8ff78, #78ffd6); /* Gradasi teks hijau */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-box p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 35px;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            outline: none;
            color: #fff;
            font-size: 14px;
            transition: 0.4s;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #a8ff78;
            box-shadow: 0 0 15px rgba(168, 255, 120, 0.3);
        }

        .input-group label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #a8ff78;
            text-transform: uppercase;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #2ecc71, #27ae60);
            border: none;
            border-radius: 15px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 10px 20px rgba(46, 204, 113, 0.3);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(46, 204, 113, 0.4);
            filter: brightness(1.1);
        }

        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer a {
            color: #a8ff78;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .footer a:hover {
            text-shadow: 0 0 8px rgba(168, 255, 120, 0.6);
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>ASPIRASI</h2>
        <p>Suarakan perubahan untuk sekolah kita</p>

        <form action="index.php?page=login" method="POST">
            <div class="input-group">
                <label>NIS / Username</label>
                <input type="text" name="username" placeholder="Contoh: 1111" required autocomplete="off">
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit">LOGIN SEKARANG</button>
        </form>

        <div class="footer">
            Belum bergabung? <a href="index.php?page=register">Daftar Akun</a>
        </div>
    </div>

</body>
</html>