<?php
// controllers/ctrl_auth.php
require_once 'models/m_auth.php';

class ctrl_auth extends cn_database {
    private $model;

    public function __construct() {
        parent::__construct();
        $this->model = new m_auth();
    }

    /**
     * FITUR NOTIFIKASI POP-UP (REAL-TIME)
     * Method ini dipanggil via AJAX untuk mengecek kondisi laporan di database
     */
    public function cek_status() {
        $output = ['status' => 'kosong'];

        if (isset($_SESSION['admin'])) {
            // Admin: Cek apakah ada laporan baru dengan status 'Menunggu'
            // Menggunakan properti $this->db dari cn_database
            $q = mysqli_query($this->db, "SELECT id_aspirasi FROM tb_aspirasi WHERE status = 'Menunggu' LIMIT 1");
            if (mysqli_num_rows($q) > 0) {
                $output = [
                    'status' => 'ada_laporan', 
                    'pesan' => 'Halo Admin! Ada aspirasi baru dari siswa yang perlu diperiksa. 📋'
                ];
            }
        } elseif (isset($_SESSION['nis'])) {
            // Siswa: Cek apakah ada laporan miliknya yang statusnya baru saja diubah jadi 'Selesai'
            $nis = $_SESSION['nis'];
            $q = mysqli_query($this->db, "SELECT id_aspirasi FROM tb_aspirasi WHERE nis = '$nis' AND status = 'Selesai' LIMIT 1");
            if (mysqli_num_rows($q) > 0) {
                $output = [
                    'status' => 'laporan_selesai', 
                    'pesan' => 'Kabar baik! Aspirasi yang kamu kirimkan sudah selesai ditindaklanjuti. 🌿'
                ];
            }
        }
        
        // Mengirimkan hasil ke JavaScript dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($output);
        exit;
    }

    public function login() {
        // Mencegah user yang sudah login mengakses halaman login lagi
        if (isset($_SESSION['admin'])) {
            header("Location: index.php?page=admin_dashboard");
            exit;
        } elseif (isset($_SESSION['nis'])) {
            header("Location: index.php?page=aspirasi");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // 1. Cek Login Admin
            $admin = $this->model->check_admin($user, $pass);
            if ($admin) {
                $_SESSION['admin'] = $admin['username'];
                header("Location: index.php?page=admin_dashboard");
                exit;
            } 

            // 2. Cek Login Siswa
            $siswa = $this->model->check_siswa($user, $pass);
            if ($siswa) {
                $_SESSION['nis'] = $siswa['nis'];
                header("Location: index.php?page=aspirasi");
                exit;
            }

            echo "<script>alert('Login Gagal! Akun tidak ditemukan atau Password salah.');</script>";
        }
        include 'views/v_login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nis = $_POST['nis'];
            $kelas = $_POST['kelas'];
            $password = $_POST['password'];

            if ($this->model->reg_siswa($nis, $kelas, $password)) {
                echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='index.php?page=login';</script>";
                exit;
            } else {
                echo "<script>alert('Registrasi Gagal!');</script>";
            }
        }
        include 'views/v_register.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}