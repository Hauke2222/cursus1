<?php
require_once('pdo.php');

$stmt = $pdo->query("SELECT company, last_name, first_name, job_title FROM suppliers");
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
            <th>Company</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Job Title</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo $row['company']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['job_title']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</html>