<?php 

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) 
            VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':product_naam' => $product_naam,
        ':prijs_per_stuk' => $prijs_per_stuk,
        ':omschrijving' => $omschrijving
    ]);

    echo "Product toegevoegd!";
}