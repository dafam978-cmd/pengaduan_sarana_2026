<?php
// index.php
session_start();

require_once 'config/cn_database.php';
// Load file controller
require_once 'controllers/ctrl_auth.php';
require_once 'controllers/ctrl_admin.php';
require_once 'controllers/ctrl_siswa.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'login':
        if (isset($_SESSION['admin'])) {
            header("Location: index.php?page=admin_dashboard");
            exit;
        } elseif (isset($_SESSION['nis'])) {
            header("Location: index.php?page=aspirasi");
            exit;
        }
        $auth = new ctrl_auth();
        $auth->login();
        break;
        
    case 'register':
        $auth = new ctrl_auth();
        $auth->register();
        break;
        
    case 'logout':
        $auth = new ctrl_auth();
        $auth->logout();
        break;
        
    // --- FITUR ADMIN ---
    case 'admin_dashboard':
        $admin = new ctrl_admin();
        $admin->dashboard();
        break;
        
    case 'umpan_balik':
        $admin = new ctrl_admin();
        $admin->umpan_balik();
        break;

    case 'tambah_kategori':
        $admin = new ctrl_admin();
        $admin->tambah_kategori();
        break;

    case 'cetak_laporan':
        $admin = new ctrl_admin();
        $admin->cetak();
        break;

    // --- FITUR NOTIFIKASI (REAL-TIME) ---
    case 'cek_status':
        $auth = new ctrl_auth();
        $auth->cek_status();
        break;

    // --- FITUR SISWA ---
    case 'aspirasi':
        $siswa = new ctrl_siswa();
        $siswa->form_aspirasi();
        break;

    case 'kirim_aspirasi':
        $siswa = new ctrl_siswa();
        $siswa->kirim();
        break;

    case 'histori':
        $siswa = new ctrl_siswa();
        $siswa->histori();
        break;

    // --- FITUR EDIT & HAPUS SISWA ---
    case 'edit_aspirasi':
        $siswa = new ctrl_siswa();
        $siswa->form_edit();
        break;

    case 'proses_edit':
        $siswa = new ctrl_siswa();
        $siswa->proses_edit();
        break;

    case 'hapus_aspirasi':
        $siswa = new ctrl_siswa();
        $siswa->hapus();
        break;

    default:
        $auth = new ctrl_auth();
        $auth->login();
        break;
        case 'riwayat_admin':
    $admin->riwayat();
    break;
    case 'profil_admin':
    include "views/v_profil_admin.php";
    break;
}