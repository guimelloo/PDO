<?php
require_once "db.php";

$sql = "SELECT * FROM producten";
$stmt = $pdo->query($sql);

$products = [];
while ($row = $stmt->fetch()) {
    $products[] = [
        'code' => htmlspecialchars($row['product_code']),
        'naam' => htmlspecialchars($row['product_naam']),
        'prijs' => htmlspecialchars($row['prijs_per_stuk']),
        'omschrijving' => htmlspecialchars($row['omschrijving'])
    ];
}

header('Content-Type: application/json');
echo json_encode($products);