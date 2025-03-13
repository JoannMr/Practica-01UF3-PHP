<?php
function getUsersOrdersPDO() {
    $config = require __DIR__ . '/../config/config.php';
    
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $pdo = new PDO($dsn, $config['user'], $config['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta INNER JOIN entre usuaris i comandes
        $stmt = $pdo->prepare("SELECT u.nom, c.producte, c.preu FROM usuaris u INNER JOIN comandes c ON u.id = c.usuari_id");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
