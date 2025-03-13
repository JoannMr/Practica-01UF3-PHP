<?php
function getUsersWithMySQLi() {
    $config = require __DIR__ . '/../config/config.php';
    
    // Conexión
    $conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['dbname']);
    if ($conn->connect_error) {
        return ['error' => $conn->connect_error];
    }
    
    // Consulta simple
    $resultSimple = $conn->query("SELECT * FROM usuaris WHERE edat > 25");
    $usersSimple = [];
    if ($resultSimple) {
        while ($row = $resultSimple->fetch_assoc()) {
            $usersSimple[] = $row;
        }
    }
    
    // Consulta preparada
    $stmt = $conn->prepare("SELECT * FROM usuaris WHERE edat > ?");
    $age = 25;
    $stmt->bind_param("i", $age);
    $stmt->execute();
    $resultPrep = $stmt->get_result();
    $usersPrepared = [];
    while ($row = $resultPrep->fetch_assoc()) {
        $usersPrepared[] = $row;
    }
    
    $stmt->close();
    $conn->close();
    
    return [
        'simple'    => $usersSimple,
        'prepared'  => $usersPrepared
    ];
}
