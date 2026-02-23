<?php
// models/m_siswa.php
class m_siswa extends cn_database {
    
    public function get_kategori() {
        $query = "SELECT * FROM tb_kategori";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function simpan_aspirasi($data) {
        // Query disesuaikan dengan kolom foto baru
        $query = "INSERT INTO tb_input_aspirasi (nis, id_kategori, lokasi, ket, foto) 
                  VALUES (:nis, :id_kategori, :lokasi, :ket, :foto)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nis', $data['nis']);
        $stmt->bindParam(':id_kategori', $data['id_kategori']);
        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':ket', $data['ket']);
        $stmt->bindParam(':foto', $data['foto']);
        return $stmt->execute();
    }

    public function get_histori_siswa($nis) {
        $query = "SELECT ia.*, k.ket_kategori, a.status, a.feedback 
                  FROM tb_input_aspirasi ia
                  JOIN tb_kategori k ON ia.id_kategori = k.id_kategori
                  LEFT JOIN tb_aspirasi a ON ia.id_pelaporan = a.id_pelaporan
                  WHERE ia.nis = :nis
                  ORDER BY ia.id_pelaporan DESC"; 
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nis', $nis);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}