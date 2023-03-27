<?php
require_once('pdo.php');

$stmt = $pdo->query("SELECT COUNT(*) as count, Discontinued FROM products GROUP BY Discontinued");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Suppliers</title>
    <link href="main.css" rel="stylesheet">
</head>

<table>
    <thead>
        <tr>
            <th>Discontinued</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo $row['Discontinued']; ?></td>
                <td><?php echo $row['count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</html>