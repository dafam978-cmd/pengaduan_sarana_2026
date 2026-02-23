<style>
    /* Section Utama Profil - Mengikuti margin main-content */
    .profile-page-wrapper {
        animation: fadeIn 0.8s ease-out;
    }

    /* Card Profil dengan Glassmorphism identik Dashboard */
    .profile-card-glass {
        background: var(--card-bg); /* Mengambil variabel dari Dashboard */
        border: 1px solid var(--border-glass);
        border-radius: 24px;
        padding: 60px 40px;
        backdrop-filter: blur(10px);
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    /* Avatar Styling */
    .profile-avatar-circle {
        width: 130px;
        height: 130px;
        background: rgba(16, 185, 129, 0.1);
        border: 2px solid var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
        margin: 0 auto 20px;
        box-shadow: 0 0 30px rgba(16, 185, 129, 0.2);
    }

    /* Label Role */
    .badge-admin {
        background: rgba(16, 185, 129, 0.2);
        color: var(--primary-green);
        padding: 6px 16px;
        border-radius: 100px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-block;
        margin-bottom: 25px;
    }

    /* Grid Informasi */
    .profile-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin: 30px 0;
        text-align: left;
    }

    .profile-info-item {
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid var(--border-glass);
        padding: 20px;
        border-radius: 16px;
    }

    .profile-info-item label {
        display: block;
        color: var(--primary-green);
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .profile-info-item .info-text {
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
    }

    /* Button Ganti Password (Identik dengan tombol Simpan) */
    .btn-update-profile {
        background: var(--primary-green);
        color: #0b1120;
        border: none;
        padding: 18px;
        border-radius: 15px;
        font-weight: 800;
        cursor: pointer;
        width: 100%;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-update-profile:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        filter: brightness(1.1);
    }
</style>

<div class="profile-page-wrapper">
    <div class="header-flex" style="margin-bottom: 40px;">
        <div class="header-text">
            <h1 style="font-size: 32px; font-weight: 800; letter-spacing: -1px;">Profil Admin 👤</h1>
            <p style="color: var(--text-gray);">Informasi detail akun administrator pusat.</p>
        </div>
    </div>

    <div class="profile-card-glass">
        <div class="profile-avatar-circle">👨‍💻</div>
        <div class="badge-admin">Administrator Penuh</div>
        
        <h2 style="color: #fff; font-size: 28px; margin-bottom: 5px;">
            <?= $_SESSION['admin_name'] ?? 'Super Admin' ?>
        </h2>
        <p style="color: var(--text-gray); margin-bottom: 10px;">Eco-Aspirasi Authority System</p>

        <div class="profile-info-grid">
            <div class="profile-info-item">
                <label>Username Account</label>
                <div class="info-text"><?= $_SESSION['admin_username'] ?? 'admin' ?></div>
            </div>
            <div class="profile-info-item">
                <label>Access Privilege</label>
                <div class="info-text">Full System Control</div>
            </div>
        </div>

        <button onclick="editPasswordPop()" class="btn-update-profile">
            🔐 Ganti Password Akun
        </button>
    </div>
</div>