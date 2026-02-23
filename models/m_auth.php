<?php
// models/m_auth.php
class m_auth extends cn_database {

    // Cek Login Admin
    public function check_admin($username, $password) {
        $password_md5 = md5($password);
        $query = "SELECT * FROM tb_admin WHERE username = :user AND password = :pass";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user', $username);
        $stmt->bindParam(':pass', $password_md5);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cek Login Siswa (NIS sebagai Username)
    public function check_siswa($nis, $password) {
        $password_md5 = md5($password);
        $query = "SELECT * FROM tb_siswa WHERE nis = :nis AND password = :pass";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':pass', $password_md5);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Registrasi Siswa dengan Password
    public function reg_siswa($nis, $kelas, $password) {
        $password_md5 = md5($password);
        $query = "INSERT INTO tb_siswa (nis, kelas, password) VALUES (:nis, :kelas, :pass)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nis', $nis);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':pass', $password_md5);
        return $stmt->execute();
    }
}