<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Aesthetic Green</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body {
            /* Background Konsisten dengan Login */
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            background-image: url('https://images.unsplash.com/photo-1501004318641-b39e6451bec6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(15, 32, 39, 0.7);
            z-index: 1;
        }

        .register-box {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 450px;
            padding: 40px 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            text-align: center;
            color: #fff;
        }

        .register-box h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 5px;
            background: linear-gradient(to right, #a8ff78, #78ffd6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .register-box p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 30px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
            font-weight: 600;
            color: #a8ff78;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
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

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #2ecc71, #27ae60);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.4s;
            margin-top: 10px;
            box-shadow: 0 10px 20px rgba(46, 204, 113, 0.2);
        }

        button:hover {
            transform: translateY(-3px);
            filter: brightness(1.1);
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer a {
            color: #a8ff78;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>BERGABUNG 🌿</h2>
        <p>Daftarkan akun siswa untuk mulai melapor</p>

        <form action="index.php?page=register" method="POST">
            <div class="input-group">
                <label>Nomor Induk Siswa (NIS)</label>
                <input type="text" name="nis" placeholder="Masukkan NIS Anda" required autocomplete="off">
            </div>

            <div class="input-group">
                <label>Kelas</label>
                <input type="text" name="kelas" placeholder="Contoh: XII RPL 1" required>
            </div>
            
            <div class="input-group">
                <label>Password Baru</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit">DAFTAR SEKARANG</button>
        </form>

        <div class="footer">
            Sudah punya akun? <a href="index.php?page=login">Login Disini</a>
        </div>
    </div>

</body>
</html>