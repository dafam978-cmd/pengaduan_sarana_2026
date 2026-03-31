<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Riwayat Aspirasi | Eco-Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #10b981;
            --bg-dark: #0b1120;
            --card-bg: rgba(30, 41, 59, 0.5);
            --border: rgba(255, 255, 255, 0.05);
            --text-muted: #94a3b8;
            --sidebar-width: 260px;
        }

        /* --- ANIMASI KEYFRAMES --- */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes scaleUp {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        
        body { 
            background: var(--bg-dark); 
            background-image: radial-gradient(circle at top right, rgba(16, 185, 129, 0.08), transparent 400px);
            color: #fff; 
            display: flex; 
            min-height: 100vh; 
            overflow-x: hidden;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: var(--sidebar-width); 
            background: #0f172a; 
            border-right: 1px solid var(--border);
            display: flex; 
            flex-direction: column; 
            padding: 40px 20px; 
            position: fixed; 
            height: 100vh;
            animation: slideInLeft 0.6s ease-out;
            z-index: 100;
        }
        .sidebar h2 { font-size: 20px; font-weight: 800; color: var(--primary); margin-bottom: 40px; letter-spacing: -1px; }
        .nav-item {
            padding: 14px 18px; color: var(--text-muted); text-decoration: none;
            font-size: 14px; font-weight: 600; border-radius: 12px; margin-bottom: 8px;
            transition: 0.3s; display: flex; align-items: center; gap: 10px;
        }
        .nav-item:hover, .nav-item.active { background: rgba(16, 185, 129, 0.1); color: var(--primary); }

        /* --- MAIN CONTENT --- */
        .main-content { 
            margin-left: var(--sidebar-width); 
            padding: 60px; 
            width: calc(100% - var(--sidebar-width)); 
            animation: fadeIn 0.8s ease-out;
        }
        .header { margin-bottom: 30px; }
        .header h1 { font-size: 32px; font-weight: 800; margin-bottom: 8px; }
        .header p { color: var(--text-muted); }

        /* --- SEARCH & FILTER BAR --- */
        .filter-container {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            animation: fadeIn 0.8s ease-out 0.1s both;
        }

        .search-wrapper { flex-grow: 1; }
        .search-wrapper input, .filter-wrapper select {
            width: 100%;
            padding: 14px 20px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
            backdrop-filter: blur(10px);
        }

        .search-wrapper input:focus, .filter-wrapper select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.1);
        }

        .filter-wrapper select {
            cursor: pointer;
            min-width: 180px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2310b981'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }

        /* --- TABLE CARD --- */
        .table-card {
            background: var(--card-bg); 
            border: 1px solid var(--border);
            border-radius: 24px; 
            padding: 30px; 
            backdrop-filter: blur(10px);
            animation: scaleUp 0.7s ease-out 0.2s both;
        }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; color: var(--primary); font-size: 11px; text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid var(--border); }
        
        tbody tr { transition: 0.3s; }
        tbody tr:hover { background: rgba(255, 255, 255, 0.02); transform: scale(1.005); }

        td { padding: 20px 15px; border-bottom: 1px solid var(--border); font-size: 14px; }

        /* --- STYLING FOTO --- */
        .img-thumb {
            width: 45px; height: 45px; border-radius: 10px; object-fit: cover;
            border: 1px solid var(--border); transition: 0.3s; cursor: zoom-in;
        }
        .img-thumb:hover { transform: scale(1.2); border-color: var(--primary); }
        .no-img { font-size: 10px; color: var(--text-muted); opacity: 0.5; font-style: italic; }

        .loc-text { color: #fff; font-weight: 600; display: block; margin-bottom: 4px; }
        .detail-text { color: var(--text-muted); font-size: 12px; font-style: italic; display: block; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

        .status-badge { padding: 6px 12px; border-radius: 8px; font-size: 10px; font-weight: 800; text-transform: uppercase; }
        .selesai { background: rgba(16, 185, 129, 0.1); color: var(--primary); border: 1px solid rgba(16, 185, 129, 0.2); }
        .proses { background: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); }
        .menunggu { background: rgba(245, 158, 11, 0.1); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.2); }

        .feedback-box { color: var(--primary); font-weight: 700; font-size: 13px; }
        .btn-edit { color: #f59e0b; text-decoration: none; font-weight: 700; margin-right: 12px; font-size: 13px; transition: 0.3s; }
        .btn-edit:hover { color: #fff; background: #f59e0b; padding: 4px 8px; border-radius: 6px; }
        .btn-hapus { color: #f87171; text-decoration: none; font-weight: 700; font-size: 13px; transition: 0.3s; }
        .btn-hapus:hover { color: #fff; background: #f87171; padding: 4px 8px; border-radius: 6px; }
        .locked-text { color: var(--text-muted); font-style: italic; font-size: 12px; opacity: 0.7; }

        .logout-btn { 
            margin-top: auto; color: #f87171; text-decoration: none; font-weight: 700; 
            font-size: 14px; padding: 12px; border-radius: 10px; background: rgba(239, 68, 68, 0.05);
            text-align: center; transition: 0.3s;
        }
        .logout-btn:hover { background: #ef4444; color: white; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>SISWA SAKUCI</h2>
        <nav style="display: flex; flex-direction: column; flex-grow: 1;">
            <a href="index.php?page=aspirasi" class="nav-item">📝 Buat Laporan</a>
            <a href="index.php?page=histori" class="nav-item active">📜Riwayat Saya</a>
        </nav>
        <a href="index.php?page=logout" class="logout-btn">Log Out</a>
    </aside> 

    <main class="main-content">
        <header class="header">
            <h1>Riwayat Laporan Kamu 📜</h1>
            <p>Pantau perkembangan laporan yang telah kamu kirimkan.</p>
        </header>

        <div class="filter-container">
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Cari berdasarkan lokasi atau kategori...">
            </div>
            <div class="filter-wrapper">
                <select id="statusFilter">
                    <option value="all">Semua Status</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </div>

        <section class="table-card">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 70px;">Bukti</th>
                        <th>Kategori</th>
                        <th>Lokasi & Detail</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                        <th style="text-align: center;">Aksi</th> 
                    </tr>
                </thead>
                <tbody id="aspirasiTable">
                    <?php $no=1; foreach($aspirasi as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php if(!empty($row['foto'])): ?>
                                <a href="assets/img/laporan/<?= $row['foto'] ?>" target="_blank">
                                    <img src="assets/img/laporan/<?= $row['foto'] ?>" class="img-thumb" alt="Bukti">
                                </a>
                            <?php else: ?>
                                <span class="no-img">No Photo</span>
                            <?php endif; ?>
                        </td>
                        <td style="font-weight: 700; color: var(--primary);"><?= $row['ket_kategori']; ?></td>
                        <td>
                            <span class="loc-text"><?= $row['lokasi']; ?></span>
                            <span class="detail-text" title="<?= $row['ket']; ?>">"<?= $row['ket']; ?>"</span>
                        </td>
                        <td>
                            <?php 
                                $st = $row['status'] ?? 'Menunggu';
                                if($st == 'Selesai') $class = 'selesai';
                                elseif($st == 'Proses') $class = 'proses';
                                else $class = 'menunggu';
                            ?>
                            <span class="status-badge <?= $class; ?>"><?= $st; ?></span>
                        </td>
                        <td class="feedback-box">
                            <?= !empty($row['feedback']) ? '💬 ' . htmlspecialchars($row['feedback']) : '<span style="color:var(--text-muted); font-weight:400;">Belum ada tanggapan</span>'; ?>
                        </td>
                        
                        <td style="text-align: center;">
                            <?php if(strtolower($st) == 'menunggu'): ?>
                                <a href="index.php?page=edit_aspirasi&id=<?= $row['id_pelaporan'] ?>" class="btn-edit">Edit</a>
                                <a href="index.php?page=hapus_aspirasi&id=<?= $row['id_pelaporan'] ?>" 
                                   class="btn-hapus" 
                                   onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</a>
                            <?php else: ?>
                                <span class="locked-text">🔒 Terkunci</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <script>
        // Logika Filter & Search
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('#aspirasiTable tr');

        function performFilter() {
            const searchText = searchInput.value.toLowerCase();
            const filterValue = statusFilter.value.toLowerCase();

            rows.forEach(row => {
                const kategori = row.cells[2].textContent.toLowerCase();
                const lokasi = row.querySelector('.loc-text').textContent.toLowerCase();
                const status = row.querySelector('.status-badge').textContent.toLowerCase();

                const matchSearch = kategori.includes(searchText) || lokasi.includes(searchText);
                const matchStatus = filterValue === 'all' || status === filterValue;

                if (matchSearch && matchStatus) {
                    row.style.display = "";
                    row.style.animation = "fadeIn 0.4s ease-out";
                } else {
                    row.style.display = "none";
                }
            });
        }

        searchInput.addEventListener('input', performFilter);
        statusFilter.addEventListener('change', performFilter);
    </script>

</body>
</html>