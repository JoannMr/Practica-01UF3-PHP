<?php
function getUsersWithPDO() {
    $config = require __DIR__ . '/../config/config.php';
    
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        $pdo = new PDO($dsn, $config['user'], $config['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Consulta simple
        $stmtSimple = $pdo->query("SELECT * FROM usuaris WHERE edat > 25");
        $usersSimple = $stmtSimple->fetchAll(PDO::FETCH_ASSOC);
        
        // Consulta preparada
        $stmtPrep = $pdo->prepare("SELECT * FROM usuaris WHERE edat > ?");
        $stmtPrep->execute([25]);
        $usersPrepared = $stmtPrep->fetchAll(PDO::FETCH_ASSOC);
        
        return [
            'simple'    => $usersSimple,
            'prepared'  => $usersPrepared
        ];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
