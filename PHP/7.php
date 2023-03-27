<?php
session_start();
if (!isset($_SESSION['boodschappenlijst'])) {
    $_SESSION['boodschappenlijst'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = $_POST['item'];
    array_push($_SESSION['boodschappenlijst'], $item);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Boodschappenlijst</title>
</head>

<body>
    <h1>Boodschappenlijst</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="item">Boodschap:</label>
        <input type="text" name="item" id="item">
        <button type="submit">Toevoegen</button>
    </form>
    <h2>Boodschappen:</h2>
    <ul>
        <?php foreach ($_SESSION['boodschappenlijst'] as $item) : ?>
            <li><?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>