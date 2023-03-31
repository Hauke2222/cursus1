<?php
require_once('pdo.php');


// Insert the order
$sql = "INSERT INTO orders (customer_id, employee_id, order_date, shipped_date, shipper_id, ship_name, ship_address, ship_city, ship_state_province, ship_zip_postal_code, ship_country_region, shipping_fee, taxes, payment_type, paid_date, notes, tax_rate, tax_status_id, status_id)
            VALUES (1, 4, NOW(), NOW(), 1, 'Mary', '143 Main St', 'Dallas', 'TX', '12345', 'USA', 5, 0.2, 'Credit Card', NOW(), 'New order with Biscuit and Cracker', 0.2, 1, 0)";
$pdo->exec($sql);
$order_id = $pdo->lastInsertId();

// Insert the first product
$sql = "INSERT INTO order_details (order_id, product_id, unit_price, quantity, discount)
            VALUES (:order_id, (SELECT product_id FROM products WHERE product_code = 'BISCUIT' LIMIT 1), 2, 1, 0)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['order_id' => $order_id]);

// Insert the second product
$sql = "INSERT INTO order_details (order_id, product_id, unit_price, quantity, discount)
            VALUES (:order_id, (SELECT product_id FROM products WHERE product_code = 'CRACKER' LIMIT 1), 2, 1, 0)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['order_id' => $order_id]);

$sql = "SELECT od.order_id, p.product_code, od.unit_price, od.quantity, od.discount
FROM order_details od
INNER JOIN products p ON p.id = od.product_id
WHERE od.order_id = $order_id
";
$stmt = $pdo->prepare($sql);
$order_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($order_details);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Order Details</title>
    <link href="main.css" rel="stylesheet">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_details as $detail) : ?>
                <tr>
                    <td><?php echo $detail['product_code']; ?></td>
                    <td><?php echo $detail['unit_price']; ?></td>
                    <td><?php echo $detail['quantity']; ?></td>
                    <td><?php echo $detail['discount']; ?></td>
                    <td><?php echo $detail['unit_price'] * $detail['quantity'] * (1 - $detail['discount']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>