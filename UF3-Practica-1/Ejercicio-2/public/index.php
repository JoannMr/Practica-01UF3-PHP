<?php
include __DIR__ . '/../src/pdo.php';
include __DIR__ . '/../src/mysqli.php';

$pdoResults = getUsersOrdersPDO();
$mysqliResults = getUsersOrdersMySQLi();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Exercici 2: Consultes avançades amb PDO i MySQLi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Consulta amb PDO (INNER JOIN)</h1>
        <?php if (isset($pdoResults['error'])): ?>
            <p class="error">Error: <?php echo $pdoResults['error']; ?></p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Producte</th>
                        <th>Preu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pdoResults as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['producte']); ?></td>
                            <td><?php echo htmlspecialchars($row['preu']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <h1>Consulta amb MySQLi (INNER JOIN)</h1>
        <?php if (isset($mysqliResults['error'])): ?>
            <p class="error">Error: <?php echo $mysqliResults['error']; ?></p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Producte</th>
                        <th>Preu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mysqliResults as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['producte']); ?></td>
                            <td><?php echo htmlspecialchars($row['preu']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
