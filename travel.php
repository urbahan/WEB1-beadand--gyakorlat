<?php
class Travel {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function getAll() {
        $sql = "SELECT t.*, sz.nev AS szalloda_nev FROM tavasz t 
                LEFT JOIN szalloda sz ON t.szalloda_az = sz.az 
                ORDER BY t.id DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tavasz WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($szalloda_az, $indulas, $idotartam, $ar) {
        try {
            $sql = "INSERT INTO tavasz (szalloda_az, indulas, idotartam, ar) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$szalloda_az, $indulas, $idotartam, $ar]);
        } catch (PDOException $e) {
            // Ha rossz szálloda kódot adsz meg, itt kapunk értesítést
            header("Location: index.php?page=travel&error=invalid_hotel");
            exit();
        }
    }

    public function update($id, $szalloda_az, $indulas, $idotartam, $ar) {
        try {
            $sql = "UPDATE tavasz SET szalloda_az = ?, indulas = ?, idotartam = ?, ar = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$szalloda_az, $indulas, $idotartam, $ar, $id]);
        } catch (PDOException $e) {
            header("Location: index.php?page=travel&error=invalid_hotel");
            exit();
        }
    }

    public function delete($id) {
        return $this->pdo->prepare("DELETE FROM tavasz WHERE id = ?")->execute([$id]);
    }
}