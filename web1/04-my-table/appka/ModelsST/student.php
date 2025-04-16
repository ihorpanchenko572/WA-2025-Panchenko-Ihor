<?php

class Student {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($jmeno, $prijmeni, $vek, $narodnost) {
        $sql = "INSERT INTO studenti (jmeno, prijmeni, vek, narodnost) 
                VALUES (:jmeno, :prijmeni, :vek, :narodnost)";
        
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':jmeno' => $jmeno,
            ':prijmeni' => $prijmeni,
            ':vek' => $vek,
            ':narodnost' => $narodnost,
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM studenti ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM studenti WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $jmeno, $prijmeni, $vek, $narodnost) {
        $sql = "UPDATE studenti 
                SET jmeno = :jmeno,
                    prijmeni = :prijmeni,
                    vek = :vek,
                    narodnost = :narodnost
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':jmeno' => $jmeno,
            ':prijmeni' => $prijmeni,
            ':vek' => $vek,
            ':narodnost' => $narodnost
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM studenti WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
