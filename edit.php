<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['product_code'];
    $naam = $_POST['product_naam'];
    $prijs = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    $sql = "UPDATE producten SET product_naam = ?, prijs_per_stuk = ?, omschrijving = ? WHERE product_code = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$naam, $prijs, $omschrijving, $id])) {
        header("Location: showSelect.php");
        exit();
    }
} else {
    die("Method niet bekend.");
}
?>