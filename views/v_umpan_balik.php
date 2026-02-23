<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapan Admin | Sistem Aspirasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-emerald: #10b981;
            --bg-deep: #0b0f1a;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        
        body { 
            background: var(--bg-deep);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            letter-spacing: -0.01em;
        }

        .container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .back-link:hover { color: var(--primary-emerald); transform: translateX(-5px); }

        .card {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 32px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .card-header { margin-bottom: 30px; border-bottom: 1px solid var(--glass-border); padding-bottom: 20px; }
        .card-header h2 { 
            font-size: 24px; 
            font-weight: 800; 
            background: linear-gradient(135deg, #fff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
        }
        .card-header p { color: var(--text-muted); font-size: 14px; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
            background: rgba(255,255,255,0.02);
            padding: 20px;
            border-radius: 20px;
        }
        .info-item label { display: block; font-size: 10px; font-weight: 800; color: var(--primary-emerald); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
        .info-item span { font-size: 14px; font-weight: 600; color: #fff; }

        .report-content { margin-bottom: 35px; }
        .report-content label { display: block; font-size: 10px; font-weight: 800; color: var(--primary-emerald); text-transform: uppercase; margin-bottom: 10px; }
        .report-content blockquote { 
            font-size: 16px; 
            color: #cbd5e1; 
            line-height: 1.6; 
            font-style: italic; 
            border-left: 3px solid var(--primary-emerald);
            padding-left: 20px;
        }

        .form-group { margin-bottom: 25px; }
        .form-group label { display: block; font-size: 13px; font-weight: 700; color: #fff; margin-bottom: 12px; }

        select, input[type="number"] {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            padding: 15px 20px;
            border-radius: 16px;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            outline: none;
            transition: 0.3s;
        }

        select:focus, input:focus {
            border-color: var(--primary-emerald);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.1);
        }

        option { background: #1a1f2e; color: #fff; }

        .btn-submit {
            width: 100%;
            padding: 18px;
            background: #fff;
            color: var(--bg-deep);
            border: none;
            border-radius: 18px;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.4s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: var(--primary-emerald);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3);
        }

        small { color: var(--text-muted); font-size: 11px; display: block; margin-top: 10px; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <a href="index.php?page=admin_dashboard" class="back-link">← Kembali ke Dashboard</a>

    <div class="card">
        <div class="card-header">
            <h2>Proses Laporan</h2>
            <p>Perbarui status dan berikan nomor umpan balik untuk laporan ini.</p>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <label>Kategori</label>
                <span><?= $detail['ket_kategori']; ?></span>
            </div>
            <div class="info-item">
                <label>Lokasi Kejadian</label>
                <span><?= $detail['lokasi']; ?></span>
            </div>
        </div>

        <div class="report-content">
            <label>Aspirasi Siswa</label>
            <blockquote>"<?= $detail['ket']; ?>"</blockquote>
        </div>

        <form action="" method="POST">
            <input type="hidden" name="id_pelaporan" value="<?= $detail['id_pelaporan']; ?>">

            <div class="form-group">
                <label>Status Penyelesaian</label>
                <select name="status" required>
                    <?php $st_now = $detail['status'] ?? 'Menunggu'; ?>
                    <option value="Menunggu" <?= $st_now == 'Menunggu' ? 'selected' : ''; ?>>Menunggu Peninjauan</option>
                    <option value="Proses" <?= $st_now == 'Proses' ? 'selected' : ''; ?>>Sedang Diproses</option>
                    <option value="Selesai" <?= $st_now == 'Selesai' ? 'selected' : ''; ?>>Telah Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label>Umpan Balik</label>
                <input type="number" name="feedback" required value="<?= $detail['feedback'] ?? ''; ?>" placeholder="Masukkan kode umpan balik unik">
            </div>

            <button type="submit" class="btn-submit" onclick="return confirm('Simpan perubahan pada laporan ini?')">Perbarui Laporan</button>
            <small>*Perubahan ini akan tersimpan dan dapat dilihat langsung oleh siswa.</small>
        </form>
    </div>
</div>

</body>
</html>