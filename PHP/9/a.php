<?php
require_once('pdo.php');

$stmt = $pdo->query("SELECT * FROM shippers");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>

<head>
  <title>shippers</title>
  <link href="main.css" rel="stylesheet">
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Company</th>
        <th>City</th>
        <th>State/Province</th>
        <th>Zip/Postal Code</th>
        <th>Country/Region</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $row) : ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['company']; ?></td>
          <td><?php echo $row['city']; ?></td>
          <td><?php echo $row['state_province']; ?></td>
          <td><?php echo $row['zip_postal_code']; ?></td>
          <td><?php echo $row['country_region']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>