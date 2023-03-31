<?php
require_once('pdo.php');

$stmt = $pdo->query(
    'SELECT it.product_id, 
    CAST(SUM(it.quantity) AS UNSIGNED) AS inkoop_totaal, 
    CAST(SUM(od.quantity) AS UNSIGNED) AS verkoop_totaal,
    CAST(SUM(it.quantity) - SUM(od.quantity) AS SIGNED) AS tekort
FROM inventory_transactions it
INNER JOIN order_details od
ON it.product_id = od.product_id
GROUP BY it.product_id, od.product_id
HAVING tekort < 0;
'
);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tekort</title>
    <link href="main.css" rel="stylesheet">
</head>

<table>
    <thead>
        <tr>
            <th>product_id</th>
            <th>inkoop_totaal</th>
            <th>verkoop_totaal</th>
            <th>tekort</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['inkoop_totaal']; ?></td>
                <td><?php echo $row['verkoop_totaal']; ?></td>
                <td><?php echo $row['tekort']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</html>