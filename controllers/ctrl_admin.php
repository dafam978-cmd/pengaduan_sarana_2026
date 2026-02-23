<?php
// controllers/ctrl_admin.php
require_once 'models/m_aspirasi.php';

class ctrl_admin extends cn_database {
    private $model;

    public function __construct() {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $this->model = new m_aspirasi();
    }

    public function dashboard() {
        $aspirasi = $this->model->get_all_aspirasi();
        $kategori = $this->model->get_kategori(); 

        // --- LOGIKA NOTIFIKASI BARU ---
        $jumlah_sekarang = count($aspirasi);
        $jumlah_lama = $_SESSION['last_report_count'] ?? $jumlah_sekarang;
        
        $ada_laporan_baru = false;
        if ($jumlah_sekarang > $jumlah_lama) {
            $ada_laporan_baru = true;
        }
        // Simpan ke session untuk perbandingan berikutnya
        $_SESSION['last_report_count'] = $jumlah_sekarang;
        // ------------------------------

        include 'views/v_dashboard.php';
    }

    // --- FUNGSI RIWAYAT (BARU) ---
    public function riwayat() {
        // Mengambil semua data laporan untuk ditampilkan di halaman riwayat
        $aspirasi = $this->model->get_all_aspirasi();
        include 'views/v_riwayat_admin.php';
    }

    public function tambah_kategori() {
        if (isset($_GET['nama'])) {
            $nama = $_GET['nama'];
            $this->model->add_kategori($nama);
            header("Location: index.php?page=admin_dashboard");
        }
    }

    public function cetak() {
        $aspirasi = $this->model->get_all_aspirasi();
        include 'views/v_cetak.php';
    }

    public function umpan_balik() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?page=admin_dashboard");
            exit;
        }

        $id_pelaporan = $_GET['id'];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = $_POST['status'];
            $feedback = $_POST['feedback'];

            if ($this->model->update_umpan_balik($id_pelaporan, $status, $feedback)) {
                // Notifikasi sukses simpan
                echo "<script>alert('Status laporan berhasil diperbarui!'); window.location='index.php?page=admin_dashboard';</script>";
                exit;
            }
        }

        $detail = $this->model->get_aspirasi_by_id($id_pelaporan);
        include 'views/v_umpan_balik.php';
    }
}