<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Aspirasi | Eco-Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #10b981; --bg: #0b1120; --card: rgba(30, 41, 59, 0.5); }
        body { background: var(--bg); color: #fff; font-family: 'Plus Jakarta Sans', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .form-card { background: var(--card); padding: 40px; border-radius: 24px; border: 1px solid rgba(255,255,255,0.05); width: 100%; max-width: 500px; backdrop-filter: blur(10px); }
        h1 { font-size: 24px; font-weight: 800; margin-bottom: 25px; color: var(--primary); }
        label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 600; color: #94a3b8; }
        input, select, textarea { 
            width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); 
            border-radius: 12px; color: #fff; margin-bottom: 20px; outline: none; 
        }
        input:focus, textarea:focus { border-color: var(--primary); }
        .btn-save { background: var(--primary); color: #0b1120; border: none; padding: 14px; width: 100%; border-radius: 12px; font-weight: 800; cursor: pointer; transition: 0.3s; }
        .btn-save:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3); }
        .btn-back { display: block; text-align: center; margin-top: 15px; color: #94a3b8; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>

<div class="form-card">
    <h1>Edit Laporan 📝</h1>
    <form action="index.php?page=proses_edit" method="POST">
        <input type="hidden" name="id_pelaporan" value="<?= $data['id_pelaporan'] ?>">

        <label>KATEGORI</label>
        <select name="id_kategori">
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id_kategori'] ?>" <?= ($k['id_kategori'] == $data['id_kategori']) ? 'selected' : '' ?>>
                    <?= $k['ket_kategori'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>LOKASI SPESIFIK</label>
        <input type="text" name="lokasi" value="<?= htmlspecialchars($data['lokasi']) ?>" required>

        <label>DESKRIPSI MASALAH</label>
        <textarea name="ket" rows="4" required><?= htmlspecialchars($data['ket']) ?></textarea>

        <button type="submit" class="btn-save">SIMPAN PERUBAHAN</button>
        <a href="index.php?page=histori" class="btn-back">Batal dan Kembali</a>
    </form>
</div>

</body>
</html>