<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Aspirasi | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #10b981;
            --bg-dark: #0b1120;
            --sidebar-bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.5);
            --border-glass: rgba(255, 255, 255, 0.05);
            --text-gray: #94a3b8;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: var(--bg-dark); color: #fff; display: flex; min-height: 100vh; }

        /* --- SIDEBAR --- */
        .sidebar { width: 260px; background: var(--sidebar-bg); border-right: 1px solid var(--border-glass); padding: 40px 20px; position: fixed; height: 100vh; }
        .sidebar h2 { font-size: 22px; color: var(--primary-green); margin-bottom: 40px; }
        .nav-link { padding: 14px; color: var(--text-gray); text-decoration: none; display: block; border-radius: 12px; margin-bottom: 10px; }
        .nav-link:hover { background: rgba(255, 255, 255, 0.05); }
        .nav-link.active { background: rgba(16, 185, 129, 0.1); color: var(--primary-green); font-weight: bold; }

        /* --- MAIN CONTENT --- */
        .main-content { margin-left: 260px; padding: 60px; width: calc(100% - 260px); }
        .header-section { margin-bottom: 40px; }
        
        /* --- SEARCH BOX --- */
        .search-box {
            background: var(--card-bg);
            border: 1px solid var(--border-glass);
            padding: 12px 20px;
            border-radius: 15px;
            color: #fff;
            width: 300px;
            margin-bottom: 20px;
            outline: none;
        }

        .table-container {
            background: var(--card-bg);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            padding: 30px;
            backdrop-filter: blur(10px);
        }

        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; color: var(--primary-green); font-size: 12px; text-transform: uppercase; border-bottom: 1px solid var(--border-glass); }
        td { padding: 18px 15px; border-bottom: 1px solid var(--border-glass); font-size: 14px; }

        .status-badge { padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 800; }
        .bg-menunggu { background: rgba(249, 115, 22, 0.1); color: #f97316; }
        .bg-proses { background: rgba(16, 185, 129, 0.1); color: var(--primary-green); }
        .bg-selesai { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }

        tr:hover { background: rgba(255, 255, 255, 0.02); }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>KANG ADMIN</h2>
        <nav>
            <a href="index.php?page=admin_dashboard" class="nav-link">📊 Dashboard</a>
            <a href="index.php?page=riwayat_admin" class="nav-link active">📜 Riwayat Laporan</a>
        </nav>
        <a href="index.php?page=logout" style="margin-top:auto; color:#f87171; text-decoration:none; display:block; padding: 15px;">Log Out</a>
    </aside>

    <main class="main-content">
        <div class="header-section">
            <h1>Riwayat Semua Aspirasi 📜</h1>
            <p style="color: var(--text-gray);">Daftar seluruh laporan yang pernah masuk ke sistem.</p>
        </div>

        <input type="text" id="searchInput" class="search-box" placeholder="Cari NIS atau Lokasi..." onkeyup="searchTable()">

        <div class="table-container">
            <table id="riwayatTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>NIS</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Tanggapan Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($aspirasi as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d/m/Y', strtotime($row['tgl_input'])) ?></td>
                        <td><strong><?= $row['nis'] ?></strong></td>
                        <td><?= $row['ket_kategori'] ?></td>
                        <td><?= $row['lokasi'] ?></td>
                        <td>
                            <?php $st = strtolower($row['status']); ?>
                            <span class="status-badge bg-<?= $st ?>"><?= strtoupper($st) ?></span>
                        </td>
                        <td style="color: var(--text-gray); font-style: italic;">
                            <?= !empty($row['feedback']) ? $row['feedback'] : '-' ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function searchTable() {
            let input = document.getElementById("searchInput");
            let filter = input.value.toUpperCase();
            let table = document.getElementById("riwayatTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let tdNis = tr[i].getElementsByTagName("td")[2];
                let tdLokasi = tr[i].getElementsByTagName("td")[4];
                if (tdNis || tdLokasi) {
                    let textNis = tdNis.textContent || tdNis.innerText;
                    let textLokasi = tdLokasi.textContent || tdLokasi.innerText;
                    if (textNis.toUpperCase().indexOf(filter) > -1 || textLokasi.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>