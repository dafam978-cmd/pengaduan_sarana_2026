<?php
// Logika Hitung Statistik Otomatis
$total = count($aspirasi);
$menunggu = 0; $proses = 0; $selesai = 0;

foreach ($aspirasi as $item) {
    $status_check = strtolower($item['status'] ?? 'menunggu');
    if ($status_check == 'menunggu') $menunggu++;
    elseif ($status_check == 'proses') $proses++;
    elseif ($status_check == 'selesai') $selesai++;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Eco-Aspirasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --primary-green: #10b981; 
            --bg-dark: #0b1120;       
            --sidebar-bg: #0f172a;    
            --card-bg: rgba(30, 41, 59, 0.5);
            --border-glass: rgba(255, 255, 255, 0.05);
            --text-gray: #94a3b8;
            --sidebar-width: 260px;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes scaleUp { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: var(--bg-dark); background-image: radial-gradient(circle at top right, rgba(16, 185, 129, 0.08), transparent 400px); color: #fff; display: flex; min-height: 100vh; overflow-x: hidden; }

        /* --- SIDEBAR --- */
        .sidebar { width: var(--sidebar-width); background: var(--sidebar-bg); border-right: 1px solid var(--border-glass); display: flex; flex-direction: column; padding: 40px 20px; position: fixed; height: 100vh; animation: slideInLeft 0.6s ease-out; z-index: 100; }
        .sidebar h2 { font-size: 22px; font-weight: 800; color: var(--primary-green); margin-bottom: 40px; padding-left: 15px; letter-spacing: -1px; }
        .nav-link { padding: 14px 18px; color: var(--text-gray); text-decoration: none; font-size: 14px; font-weight: 600; border-radius: 12px; transition: 0.3s; margin-bottom: 8px; display: flex; align-items: center; gap: 12px; }
        .nav-link.active { background: rgba(16, 185, 129, 0.1); color: var(--primary-green); }
        .logout-btn { margin-top: auto; color: #f87171; padding: 15px; text-decoration: none; font-size: 14px; font-weight: 700; border-radius: 12px; background: rgba(239, 68, 68, 0.05); text-align: center; transition: 0.3s; }
        .logout-btn:hover { background: #ef4444; color: white; }

        /* --- CONTENT --- */
        .main-content { margin-left: var(--sidebar-width); padding: 60px; width: calc(100% - var(--sidebar-width)); animation: fadeIn 0.8s ease-out; }
        .header-flex { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 40px; }

        /* --- STATS --- */
        .stats-container { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px; }
        .stat-card { background: var(--card-bg); border: 1px solid var(--border-glass); padding: 25px; border-radius: 20px; backdrop-filter: blur(10px); animation: scaleUp 0.5s ease-out both; transition: 0.3s; }
        .stat-card p { font-size: 32px; font-weight: 800; color: var(--primary-green); margin-top: 10px; }
        .stat-card h3 { font-size: 14px; color: var(--text-gray); text-transform: uppercase; }

        /* --- FILTER --- */
        .admin-filter-bar { display: flex; gap: 15px; margin-bottom: 25px; }
        .search-box { flex-grow: 1; }
        .search-box input, .filter-box select { width: 100%; padding: 12px 20px; background: var(--card-bg); border: 1px solid var(--border-glass); border-radius: 12px; color: #fff; outline: none; }

        /* --- TABLE & FOTO --- */
        .table-card { background: var(--card-bg); border: 1px solid var(--border-glass); border-radius: 24px; padding: 30px; backdrop-filter: blur(10px); }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; color: var(--primary-green); font-size: 11px; text-transform: uppercase; border-bottom: 1px solid var(--border-glass); }
        td { padding: 20px 15px; border-bottom: 1px solid var(--border-glass); font-size: 14px; vertical-align: middle; }

        /* Styling Foto Bukti */
        .img-evidence {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            border: 2px solid var(--border-glass);
        }
        .img-evidence:hover {
            transform: scale(1.1);
            border-color: var(--primary-green);
        }
        .no-img {
            font-size: 10px;
            color: var(--text-gray);
            font-style: italic;
        }

        .status-badge { padding: 6px 12px; border-radius: 8px; font-size: 10px; font-weight: 800; text-transform: uppercase; }
        .bg-menunggu { background: rgba(249, 115, 22, 0.1); color: #f97316; }
        .bg-proses { background: rgba(16, 185, 129, 0.1); color: var(--primary-green); }
        .bg-selesai { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }

        .btn-update { background: var(--primary-green); color: #0b1120; border: none; padding: 10px 15px; border-radius: 10px; font-weight: 800; cursor: pointer; font-size: 11px; }
        select, .input-feedback { background: rgba(15, 23, 42, 0.8) !important; border: 1px solid var(--border-glass); color: #ffffff !important; padding: 10px 12px; border-radius: 10px; outline: none; }
    </style>
</head>
<body>

    <aside class="sidebar">
    <h2>KANG ADMIN</h2>
    <nav style="display: flex; flex-direction: column; flex-grow: 1;">
        <a href="index.php?page=admin_dashboard" class="nav-link <?= ($_GET['page'] == 'admin_dashboard') ? 'active' : '' ?>">📊 Dashboard</a>
        <a href="index.php?page=profil_admin" class="nav-link <?= ($_GET['page'] == 'profil_admin') ? 'active' : '' ?>">👤 Profil Admin</a>
        <a href="index.php?page=cetak_laporan" target="_blank" class="nav-link">🖨️ Print PDF</a>
    </nav>
    <a href="index.php?page=logout" class="logout-btn">Log Out</a>
</aside>

    <main class="main-content">
        <div class="header-flex">
            <div class="header-text">
                <h1>Dashboard Admin 🌿</h1>
                <p style="color: var(--text-gray);">Kelola aspirasi dengan data akurat dan bukti visual.</p>
            </div>
            <button onclick="tambahKategoriPop()" style="padding: 12px 20px; border-radius: 12px; background: rgba(16, 185, 129, 0.2); color: var(--primary-green); border: 1px solid var(--primary-green); cursor: pointer;">+ Kategori</button>
        </div>

        <div class="stats-container">
            <div class="stat-card"><h3>Total</h3><p><?= $total ?></p></div>
            <div class="stat-card"><h3>Menunggu</h3><p><?= $menunggu ?></p></div>
            <div class="stat-card"><h3>Proses</h3><p><?= $proses ?></p></div>
            <div class="stat-card"><h3>Selesai</h3><p><?= $selesai ?></p></div>
        </div>

        <div class="admin-filter-bar">
            <div class="search-box"><input type="text" id="adminSearch" placeholder="Cari NIS, Lokasi, atau isi laporan..."></div>
            <div class="filter-box">
                <select id="adminStatusFilter">
                    <option value="all">Semua Status</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Bukti</th>
                        <th>Waktu & Pelapor</th>
                        <th>Lokasi & Detail</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                    </tr>
                </thead>
                <tbody id="aspirasiBody">
                    <?php foreach($aspirasi as $row): ?>
                    <tr>
                        <td>
    <?php 
    // Tambahkan sub-folder 'laporan' sesuai folder aslimu
    $path_foto = "assets/img/laporan/" . $row['foto']; 
    
    if(!empty($row['foto']) && file_exists($path_foto)): 
    ?>
        <img src="<?= $path_foto ?>" 
             class="img-evidence" 
             onclick="viewImage('<?= $path_foto ?>')"
             style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px; cursor: pointer;">
    <?php else: ?>
        <div class="no-img" style="font-size: 10px; color: #94a3b8; text-align: center;">
            Tanpa<br>Foto
        </div>
    <?php endif; ?>
</td>
                        <td>
                            <div style="font-weight: 700;"><?= date('d/m/Y', strtotime($row['tgl_input'] ?? 'now')) ?></div>
                            <div class="nis-text" style="color: var(--text-gray); font-size: 12px;">NIS: <?= $row['nis'] ?></div>
                        </td>
                        <td>
                            <div class="loc-text" style="font-weight: 600;"><?= $row['lokasi'] ?></div>
                            <div class="ket-text" style="color: var(--text-gray); font-size: 12px;">"<?= $row['ket'] ?>"</div>
                        </td>
                        <td>
                            <?php $st = strtolower($row['status'] ?? 'menunggu'); echo "<span class='status-badge bg-$st'>$st</span>"; ?>
                        </td>
                        <td>
                            <form action="index.php?page=umpan_balik&id=<?= $row['id_pelaporan'] ?>" method="POST" style="display: flex; gap: 8px;">
                                <select name="status">
                                    <option value="Menunggu" <?= ($row['status']=='Menunggu')?'selected':'' ?>>Menunggu</option>
                                    <option value="Proses" <?= ($row['status']=='Proses')?'selected':'' ?>>Proses</option>
                                    <option value="Selesai" <?= ($row['status']=='Selesai')?'selected':'' ?>>Selesai</option>
                                </select>
                                <input type="text" name="feedback" class="input-feedback" placeholder="Balas..." value="<?= htmlspecialchars($row['feedback'] ?? '') ?>">
                                <button type="submit" class="btn-update">Simpan</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        // Fungsi untuk melihat foto ukuran penuh menggunakan SweetAlert2
        function viewImage(url) {
            Swal.fire({
                imageUrl: url,
                imageAlt: 'Bukti Aspirasi',
                background: '#1e293b',
                showConfirmButton: false,
                showCloseButton: true,
                customClass: { popup: 'rounded-xl' }
            });
        }

        // Script Search & Filter Tetap Sama
        const adminSearch = document.getElementById('adminSearch');
        const adminStatusFilter = document.getElementById('adminStatusFilter');
        const rows = document.querySelectorAll('#aspirasiBody tr');

        function filterAdminTable() {
            const query = adminSearch.value.toLowerCase();
            const statusTarget = adminStatusFilter.value.toLowerCase();
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                const status = row.querySelector('.status-badge').textContent.toLowerCase();
                const matchesSearch = text.includes(query);
                const matchesStatus = statusTarget === 'all' || status === statusTarget;
                row.style.display = (matchesSearch && matchesStatus) ? "" : "none";
            });
        }
        adminSearch.addEventListener('input', filterAdminTable);
        adminStatusFilter.addEventListener('change', filterAdminTable);

        function tambahKategoriPop() {
            Swal.fire({
                title: 'Tambah Kategori',
                input: 'text',
                confirmButtonColor: '#10b981',
                background: '#1e293b',
                color: '#fff'
            }).then((res) => {
                if (res.isConfirmed && res.value) window.location.href = 'index.php?page=tambah_kategori&nama=' + res.value;
            });
        }
    </script>
</body>
</html>