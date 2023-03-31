<?php
require_once('pdo.php');

$products = [
    ['product_code' => 'BISCUIT', 'product_name' => 'Biscuit', 'description' => 'A delicious biscuit', 'standard_cost' => 1.0, 'list_price' => 2.0, 'reorder_level' => 5, 'target_level' => 20, 'quantity_per_unit' => '12 pack', 'discontinued' => 0, 'minimum_reorder_quantity' => 5, 'category' => 'Snacks'],
    ['product_code' => 'CRACKER', 'product_name' => 'Cracker', 'description' => 'A crunchy cracker', 'standard_cost' => 1.0, 'list_price' => 2.0, 'reorder_level' => 5, 'target_level' => 20, 'quantity_per_unit' => '12 pack', 'discontinued' => 0, 'minimum_reorder_quantity' => 5, 'category' => 'Snacks']
];

foreach ($products as $product) {
    $sql = "INSERT INTO products (product_code, product_name, description, standard_cost, list_price, reorder_level, target_level, quantity_per_unit, discontinued, minimum_reorder_quantity, category) VALUES (:product_code, :product_name, :description, :standard_cost, :list_price, :reorder_level, :target_level, :quantity_per_unit, :discontinued, :minimum_reorder_quantity, :category)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link href="main.css" rel="stylesheet">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Standard Cost</th>
                <th>List Price</th>
                <th>Reorder Level</th>
                <th>Target Level</th>
                <th>Quantity per Unit</th>
                <th>Discontinued</th>
                <th>Minimum Reorder Quantity</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['product_code']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['standard_cost']; ?></td>
                    <td><?php echo $product['list_price']; ?></td>
                    <td><?php echo $product['reorder_level']; ?></td>
                    <td><?php echo $product['target_level']; ?></td>
                    <td><?php echo $product['quantity_per_unit']; ?></td>
                    <td><?php echo $product['discontinued']; ?></td>
                    <td><?php echo $product['minimum_reorder_quantity']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>