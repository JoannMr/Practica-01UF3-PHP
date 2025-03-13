<?php
include __DIR__ . '/../src/pdo.php';
include __DIR__ . '/../src/mysqli.php';

$pdoResult = getUsersWithPDO();
$mysqliResult = getUsersWithMySQLi();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Exercici 1: Consultes bàsiques amb PDO i MySQLi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Consulta amb PDO</h1>
        <h2>Consulta Simple</h2>
        <?php if(isset($pdoResult['simple'])): ?>
            <ul>
                <?php foreach($pdoResult['simple'] as $user): ?>
                    <li>
                        <?php echo $user['id'] . " - " . $user['nom'] . " (" . $user['email'] . ") - " . $user['edat'] . " anys"; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="error">Error en la consulta PDO: <?php echo $pdoResult['error']; ?></p>
        <?php endif; ?>
        
        <h2>Consulta Preparada</h2>
        <?php if(isset($pdoResult['prepared'])): ?>
            <ul>
                <?php foreach($pdoResult['prepared'] as $user): ?>
                    <li>
                        <?php echo $user['id'] . " - " . $user['nom'] . " (" . $user['email'] . ") - " . $user['edat'] . " anys"; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="error">Error en la consulta PDO: <?php echo $pdoResult['error']; ?></p>
        <?php endif; ?>
    
        <hr>
    
        <h1>Consulta amb MySQLi</h1>
        <h2>Consulta Simple</h2>
        <?php if(isset($mysqliResult['simple'])): ?>
            <ul>
                <?php foreach($mysqliResult['simple'] as $user): ?>
                    <li>
                        <?php echo $user['id'] . " - " . $user['nom'] . " (" . $user['email'] . ") - " . $user['edat'] . " anys"; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="error">Error en la consulta MySQLi: <?php echo $mysqliResult['error']; ?></p>
        <?php endif; ?>
    
        <h2>Consulta Preparada</h2>
        <?php if(isset($mysqliResult['prepared'])): ?>
            <ul>
                <?php foreach($mysqliResult['prepared'] as $user): ?>
                    <li>
                        <?php echo $user['id'] . " - " . $user['nom'] . " (" . $user['email'] . ") - " . $user['edat'] . " anys"; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="error">Error en la consulta MySQLi: <?php echo $mysqliResult['error']; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
