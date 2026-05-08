<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($lastname, $firstname, $username, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            
            $sql = "INSERT INTO users (lastname, firstname, username, password) 
                    VALUES (:lastname, :firstname, :username, :password)";
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                ':lastname'  => $lastname,
                ':firstname' => $firstname,
                ':username'  => $username,
                ':password'  => $hashedPassword
            ]);
        } catch (PDOException $e) {
            die("Adatbázis hiba: " . $e->getMessage());
        }
    }

    public function login($username, $password) {
        try {
            
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                
                $user['name'] = $user['lastname'] . " " . $user['firstname'];
                return $user;
            }
            return false;
        } catch (PDOException $e) {
            die("Bejelentkezési hiba: " . $e->getMessage());
        }
    }
}