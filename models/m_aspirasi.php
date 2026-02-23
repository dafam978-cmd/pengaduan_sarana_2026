<?php
// models/m_aspirasi.php

class m_aspirasi extends cn_database {

    public function get_all_aspirasi() {
        // Optimasi: Gunakan COALESCE untuk memberikan nilai default langsung dari Query
        $query = "SELECT ia.*, k.ket_kategori, 
                         COALESCE(a.status, 'Menunggu') as status, 
                         COALESCE(a.feedback, '-') as feedback 
                  FROM tb_input_aspirasi ia
                  LEFT JOIN tb_kategori k ON ia.id_kategori = k.id_kategori
                  LEFT JOIN tb_aspirasi a ON ia.id_pelaporan = a.id_pelaporan
                  ORDER BY ia.id_pelaporan DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_aspirasi_by_id($id) {
        $query = "SELECT ia.*, k.ket_kategori, a.status, a.feedback 
                  FROM tb_input_aspirasi ia 
                  JOIN tb_kategori k ON ia.id_kategori = k.id_kategori 
                  LEFT JOIN tb_aspirasi a ON ia.id_pelaporan = a.id_pelaporan
                  WHERE ia.id_pelaporan = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_kategori() {
        $query = "SELECT * FROM tb_kategori ORDER BY ket_kategori ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_kategori($nama) {
        try {
            $q_id = "SELECT MAX(id_kategori) as max_id FROM tb_kategori";
            $stmt_id = $this->db->prepare($q_id);
            $stmt_id->execute();
            $row = $stmt_id->fetch(PDO::FETCH_ASSOC);
            $new_id = ($row['max_id']) ? $row['max_id'] + 1 : 1;

            $query = "INSERT INTO tb_kategori (id_kategori, ket_kategori) VALUES (:id, :nama)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $new_id);
            $stmt->bindParam(':nama', $nama);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update_umpan_balik($id_pelaporan, $status, $feedback) {
        $val_feedback = (trim($feedback) === "" || $feedback === null || $feedback === "0") ? "-" : $feedback;

        $check = "SELECT * FROM tb_aspirasi WHERE id_pelaporan = :id_pel";
        $stmt_check = $this->db->prepare($check);
        $stmt_check->bindParam(':id_pel', $id_pelaporan);
        $stmt_check->execute();
  
        if ($stmt_check->rowCount() > 0) {
            $query = "UPDATE tb_aspirasi SET status = :status, feedback = :feedback 
                      WHERE id_pelaporan = :id_pel";
        } else {
            $query = "INSERT INTO tb_aspirasi (id_pelaporan, status, feedback) 
                      VALUES (:id_pel, :status, :feedback)";
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pel', $id_pelaporan);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':feedback', $val_feedback);
        return $stmt->execute();
    }

    public function edit_aspirasi($id, $id_kategori, $lokasi, $ket) {
        $query = "UPDATE tb_input_aspirasi SET id_kategori = :id_kat, lokasi = :lokasi, ket = :ket WHERE id_pelaporan = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':id_kat', $id_kategori);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':ket', $ket);
        return $stmt->execute();
    }

    public function hapus_aspirasi($id) {
        try {
            $q1 = "DELETE FROM tb_aspirasi WHERE id_pelaporan = :id";
            $s1 = $this->db->prepare($q1);
            $s1->bindParam(':id', $id);
            $s1->execute();

            $q2 = "DELETE FROM tb_input_aspirasi WHERE id_pelaporan = :id";
            $s2 = $this->db->prepare($q2);
            $s2->bindParam(':id', $id);
            return $s2->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}