<?php
// controllers/ctrl_siswa.php
require_once 'models/m_siswa.php';
require_once 'models/m_aspirasi.php';

class ctrl_siswa extends cn_database {
    private $model;
    private $model_asp;

    public function __construct() {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (!isset($_SESSION['nis'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $this->model = new m_siswa();
        $this->model_asp = new m_aspirasi();
    }

    public function form_aspirasi() {
        $kategori = $this->model->get_kategori();
        include 'views/v_aspirasi.php';
    }

    public function kirim() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $foto_nama = null;

            // Logika Upload Foto
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $target_dir = "assets/img/laporan/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
                $foto_nama = time() . '_' . $_SESSION['nis'] . '.' . $file_extension;
                $target_file = $target_dir . $foto_nama;

                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
            }

            $data = [
                'nis'         => $_SESSION['nis'],
                'id_kategori' => $_POST['id_kategori'],
                'lokasi'      => $_POST['lokasi'],
                'ket'         => $_POST['ket'],
                'foto'        => $foto_nama 
            ];

            if ($this->model->simpan_aspirasi($data)) {
                echo "<script>alert('Aspirasi berhasil dikirim!'); window.location='index.php?page=histori';</script>";
            }
        }
    }

    public function histori() {
        $aspirasi = $this->model->get_histori_siswa($_SESSION['nis']);
        include 'views/v_histori.php';
    }

    public function form_edit() {
        $id = $_GET['id'];
        $data = $this->model_asp->get_aspirasi_by_id($id);
        $kategori = $this->model->get_kategori();
        include 'views/v_edit_aspirasi.php';
    }

    public function proses_edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_pelaporan'];
            $id_kat = $_POST['id_kategori'];
            $lokasi = $_POST['lokasi'];
            $ket = $_POST['ket'];

            if ($this->model_asp->edit_aspirasi($id, $id_kat, $lokasi, $ket)) {
                echo "<script>alert('Laporan berhasil diperbarui!'); window.location='index.php?page=histori';</script>";
            }
        }
    }

    public function hapus() {
        $id = $_GET['id'];
        if ($this->model_asp->hapus_aspirasi($id)) {
            echo "<script>alert('Laporan berhasil dihapus!'); window.location='index.php?page=histori';</script>";
        }
    }
}