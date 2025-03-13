<?php
function getUsersOrdersMySQLi() {
    $config = require __DIR__ . '/../config/config.php';
    
    $conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['dbname']);
    
    if ($conn->connect_error) {
        return ['error' => $conn->connect_error];
    }
    
    // Consulta INNER JOIN
    $query = "SELECT u.nom, c.producte, c.preu FROM usuaris u INNER JOIN comandes c ON u.id = c.usuari_id";
    $result = $conn->query($query);
    
    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = ['error' => $conn->error];
    }
    
    $conn->close();
    
    return $data;
}
