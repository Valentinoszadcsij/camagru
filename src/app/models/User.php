<?php
namespace App\Models;
require_once __DIR__ . "/db/db.php";

class User
{
    public function registerNewUser($name, $email, $pass)
    {
        // In a real application, this would fetch data from the database.
        // For example: `return db->query('SELECT message FROM welcome_messages')->fetch();`
        try {
            $pdo = getPDO();
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $pass]);
            return "User $name registered successfully!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}