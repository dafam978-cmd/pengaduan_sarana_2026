<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suarakan Aspirasimu | Eco-Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #10b981;
            --bg-dark: #0b1120;
            --sidebar-bg: rgba(15, 23, 42, 0.9);
            --card-bg: rgba(30, 41, 59, 0.5);
            --border-glass: rgba(255, 255, 255, 0.05);
            --text-gray: #94a3b8;
            --input-text: #cbd5e1;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background: var(--bg-dark);
            background-image: radial-gradient(circle at top right, rgba(16, 185, 129, 0.08), transparent 400px);
            color: #fff;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--border-glass);
            display: flex;
            flex-direction: column;
            padding: 40px 20px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary-green);
            margin-bottom: 40px;
            padding-left: 15px;
            letter-spacing: 1px;
        }

        .nav-item {
            padding: 14px 18px;
            color: var(--text-gray);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
            transition: 0.3s;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-green);
        }

        .logout-btn {
            margin-top: auto;
            color: #f87171;
            padding: 14px 18px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            border-radius: 12px;
            background: rgba(239, 68, 68, 0.05);
            text-align: center;
            transition: 0.3s;
        }

        .logout-btn:hover { background: #ef4444; color: white; }

        .main-content {
            margin-left: 260px;
            padding: 60px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .form-container {
            width: 100%;
            max-width: 650px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header-text { margin-bottom: 40px; }
        .header-text h1 { font-size: 32px; font-weight: 800; margin-bottom: 8px; letter-spacing: -1px; }
        .header-text p { 
            color: var(--text-gray); 
            font-size: 15px; 
            line-height: 1.6; 
            animation: slideUp 1s ease-out; 
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group { margin-bottom: 25px; }
        .form-group label { 
            display: block; 
            font-size: 11px; 
            font-weight: 800; 
            color: var(--primary-green); 
            text-transform: uppercase; 
            letter-spacing: 1.5px; 
            margin-bottom: 12px; 
        }

        input, select, textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-glass);
            padding: 16px 20px;
            border-radius: 16px;
            color: var(--input-text); 
            font-size: 14px;
            outline: none;
            transition: 0.3s;
            appearance: none;
        }

        ::placeholder {
            color: rgba(148, 163, 184, 0.3);
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2310b981'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 20px center;
            background-size: 18px;
            cursor: pointer;
        }

        option {
            background-color: #1e293b;
            color: #fff;
            padding: 10px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--primary-green);
            background: rgba(16, 185, 129, 0.03);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.1);
            color: #fff; 
        }

        textarea { min-height: 150px; line-height: 1.6; }

        .btn-submit {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            border: none;
            border-radius: 18px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.4s;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3);
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>SISWA SAKUCI</h2>
        <nav style="display: flex; flex-direction: column; flex-grow: 1;">
            <a href="index.php?page=aspirasi" class="nav-item active">📝 Buat Laporan</a>
            <a href="index.php?page=histori" class="nav-item">📜 Riwayat Saya</a>
        </nav>
        <a href="index.php?page=logout" class="logout-btn">Log Out</a>
    </aside>

    <main class="main-content">
        <div class="form-container">
            <div class="header-text">
                <h1>Halo, Siswa Hebat! Suarakan Perubahan 🌿</h1>
                <p style="color: var(--primary-green); font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Kontribusimu sangat berarti.</p>
                <p>Terima kasih sudah peduli! 🌿 Setiap laporanmu adalah langkah nyata untuk sekolah yang lebih nyaman. Tenang saja, suaramu aman dan terjaga kerahasiaannya bersama kami.</p>
            </div>

            <form action="index.php?page=kirim_aspirasi" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Pilih Kategori Laporan</label>
                    <select name="id_kategori" required>
                        <option value="" disabled selected>— Pilih Kategori Masalah —</option>
                        <?php foreach($kategori as $kat): ?>
                            <option value="<?= $kat['id_kategori'] ?>"><?= $kat['ket_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Lokasi Spesifik</label>
                    <input type="text" name="lokasi" placeholder="Misal: Toilet Lt. 2, Lapangan Basket, Lab Kimia..." required>
                </div>

                <div class="form-group">
                    <label>Deskripsi Aspirasi</label>
                    <textarea name="ket" placeholder="Jelaskan detail masalah atau saran yang ingin kamu sampaikan..." required></textarea>
                </div>

                <div class="form-group">
                    <label>Foto Bukti (Opsional)</label>
                    <input type="file" name="foto" accept="image/*">
                </div>

                <button type="submit" class="btn-submit">Kirim Aspirasi Sekarang</button>
            </form>
        </div>
    </main>

</body>
</html>